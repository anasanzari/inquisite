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
						$request->session()->put('fbid', $u->fbid);

					return redirect('himy/create');
		}

		/* end of auth */


		function index(){
			$story = Story::with('user','sticker')->orderBy('id','desc')->take(5)->get();
			return view('himy.index',['stories'=>$story]);
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

			$data = file_get_contents($url, false, stream_context_create($arrContextOptions));
			file_put_contents(public_path().'\images\himy\s.jpg', $data);

			$img = Image::make(url('images/himy.jpg'));
			$fb = Image::make(url('images/himy/s.jpg'));
			$img->insert($fb,'top-left',525,240);

			$img->text($story->user->name." met ".$story->person, 600, 400, function($font) {
			    $font->file(public_path('font/champagne.ttf'));
			    $font->size(40);
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
			$stories = Story::with('user','sticker')->orderBy('id','desc')->paginate(10);  //DB::table('photos')->paginate(6);
			$stories->setPath('');
			return view('himy.all', ['stories' => $stories]);
		}

		function save(Request $request){
			if($request->session()->has('fbid')){
				$id = $request->session()->get('fbid');

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
			if($request->session()->has('fbid')){
				$id = $request->session()->get('fbid');
				$u = FbUser::where('fbid',$id)->first();
				$stickers = Sticker::where('id','>','1')->get();
				return view('himy.create',['user'=>$u,'stickers'=>$stickers]);
			}
			return redirect('himy/login');
		}

		function login(){
			return view('himy.login');
		}


		public function view($id)
		{
			$story = Story::findorFail($id);
			$story = Story::with('user','sticker')->where('id',$id)->first();
			return view('himy.view',compact('story'));
		}


/* admin */

		function all(){
			$story = Story::all();
			return view('himy.admin_list',compact('story'));
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
