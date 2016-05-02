<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\Story;
use Socialite;
use App\FbUser;
use App\Sticker;
use Auth;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Session;

class HimyController extends Controller {

	public function __construct(){
		$this->middleware('auth',['only'=>'delete','show','all']);
	}


		/*facebook auth */

		public function redirectToProvider(){
		        return Socialite::driver('facebook')->redirect();
		}

		public function handleProviderCallback(Request $request){
		        $user = Socialite::driver('facebook')->user();
						$u = FbUser::where('fbid',$user->getId())->first();
						if(!$u){
							$u = FbUser::create(['name'=>$user->getName(),'fbid'=>$user->getId()]);
						}
						Session::put('fbid', $u->fbid);

					return redirect('himy/create');
		}

		/* end of auth */


		function index(){
			$story = Story::with('user','sticker')->orderBy('id','desc')->take(5)->get();
			$loggedin = false;
			if(Session::has('fbid')){
				$loggedin = true;
			}
			return view('himy.index',['stories'=>$story,'loggedin'=>$loggedin]);
		}

		function logout(){
			Session::flush();
			return redirect('himy');
		}


		function img($id){
			$story = Story::with('user','sticker')->where('id',$id)->first();
			$url = 'http://graph.facebook.com/'.$story->user->fbid.'/picture?type=normal';

			$arrContextOptions=array(
			    "ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
			    ),
			);
			$path = public_path().'/images/himy/s.jpg';
			if(file_exists($path)){
				unlink($path);
			}
			$data = file_get_contents($url, false, stream_context_create($arrContextOptions));
			file_put_contents($path, $data);

			$img = Image::make(url('images/himy.jpg'));
			$fb = Image::make($path);
			$img->insert($fb,'top-left',525,240);
			$text = $story->user->name." met ".$story->person;

			$img->text($text, 600, 400, function($font) {
			    $font->file(public_path('font/champagne.ttf'));
			    $font->size(70);
			    $font->color('#ffffff');
			    $font->align('center');
			    $font->valign('center');
			});

			return $img->response('jpg', 70);

		//	imagecopymerge($img, $fb, 100, 100, 0, 0, 100, 100, 75);

			// header('Content-Type: image/jpeg');
		  // return imagejpeg($img);
		}

		function listAll(){
			$stories = Story::with('user','sticker')->orderBy('id','desc')->paginate(15);  //DB::table('photos')->paginate(6);
			$stories->setPath('');
			$loggedin = false;
			if(Session::has('fbid')){
				$loggedin = true;
			}
			return view('himy.all', ['stories' => $stories,'loggedin'=>$loggedin]);
		}

		function save(Request $request){
			if(Session::has('fbid')){
				$id = Session::get('fbid');

				$story = new Story;
				$story->userid = $id;
				$values = $request->all();
				$story->person = $values['person'];
				$story->stickerid = $values['stickerid'];
				$story->content = strip_tags($values['content']);
				$story->save();
				return redirect('himy/story/'.$story->id);
			}
			return redirect('himy/login');
		}

		function create(Request $request){
			if(Session::has('fbid')){
				$id = Session::get('fbid');
				$u = FbUser::where('fbid',$id)->first();
				$stickers = Sticker::where('id','>','1')->get();
				$loggedin = true;
				return view('himy.create',['user'=>$u,'stickers'=>$stickers,'loggedin'=>$loggedin]);
			}
			return redirect('himy/login');
		}

		function login(Request $request){
			if(Session::has('fbid')){
				return redirect('himy/create');
			}
			return view('himy.login');
		}


		public function view($id){

			$loggedin = false;
			if(Session::has('fbid')){
				$loggedin = true;
			}
			$story = Story::findorFail($id);
			$story = Story::with('user','sticker')->where('id',$id)->first();
			return view('himy.view',['story'=>$story,'loggedin'=>$loggedin]);
		}


/* admin */

		function all(){
			$story = Story::all();
			return view('himy.admin_list',['story'=>$story]);
		}


		public function show($id){
			$story = Story::findorFail($id);
			return view('himy.show',compact('story'));
		}

		public function delete($id)
		{
			Story::destroy($id);
			return redirect('dashboard/himy');
		}
}
