<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Activities;
use App\Models\About;
use App\Models\Banner;
use App\Models\History;
use App\Models\Hse;
use App\Models\Management;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Career;
use App\Models\Client;
use App\Models\Csr;
use App\Models\Cause;
use App\Models\Chairmen;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Distributor;
use App\Models\Doctor;
use App\Models\DoctorAppointment;
use App\Models\DoctorSpeciality;
use App\Models\Export;
use App\Models\Enviroment;
use App\Models\Employee;
use App\Models\East;
use App\Models\Faq;
use App\Models\Health;
use App\Models\HomeService;
use App\Models\Idea;
use App\Models\Investor;
use App\Models\Innovation;
use App\Models\Intro;
use App\Models\Media;
use App\Models\Overview;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Page;
use App\Models\Press;
use App\Models\PressRelease;
use App\Models\RandomInfo;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\Safety;
use App\Models\Speciality;
use App\Models\Symptomp;
use App\Models\Social;
use App\Models\Service;
use App\Models\UserDetail;
use App\Models\Why;
use App\Models\West;
use App\Models\What;
use App\Models\Video;
use Illuminate\Http\Request;
use Validator;
class FrontEndController extends Controller
{

     /** Show Index  
     * @return Index View
    */
    public function index()
    {
        // $slider = Slider::orderBy('id','desc')->get();
        // $intro = Intro::orderBy('id')->get();
        // $chairmen = Chairmen::orderBy('id','desc')->get();
        // $banner = Banner::orderBy('id','desc')->get();
        // $blogs = Blog::where('status',1)->latest()->limit(5)->get();
        // $service = HomeService::orderBy('id')->get();
        // $about = About::where(id,'id')->get();
        $client = Client::orderBy('id')->get();
        $categories = Category::with('subcategory')->withCount('subcategory')->get()->map(function($category){
            $category->subcategory->map(function($subcategory){
                $subcategory->page_count = $subcategory->pages->count();
            });
            return $category;
        });
        // dd($categories);
        return view('web.index',compact('categories','client'));
    }

    /** Show Page Details 
     * @return Page View
    */
    public function catpage($catslug,$cat_id)
    {      
        $catagory = Category::findOrFail($cat_id);
        return view('web.catagory.catagory',compact('catagory'));

    }

    public function page($catslug,$slug,$page_id)
    {     
        // $catagory_detail = SubCategory::findOrFail($sub_cat_id);
        $page = Page::findOrFail($page_id);
        // dd($page);
        return view('web.product.product',compact('catslug','slug','page'));

    }

    /** Add Appointment  
     * @return appointment Insert into database
    */

    public function addAppointment(Request $request)
    {
        $rules = array(
            'patient_name'   => 'required',
            'city' => 'required',
            'mobile'=>'numeric|digits:10',
            'disease' => 'required|numeric'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $appointment =  new Appointment();
        $appointment->name = $request->input('patient_name');
        $appointment->city_id = $request->input('city');
        $appointment->email = $request->input('mobile');
        $appointment->sub_cat_id = $request->input('disease');
        $appointment->comment = $request->input('comment');
           
        
        if($appointment->save()){
            return response()->json(['success' => 'Your Appointment Has Been Registered Successfully.']);
        }
    }

    /** Show Press Releases  
     * @return Press Release View
    */
    public function pressRelease()
    {
        $press_releases = PressRelease::latest()->get();
        return view('web.press-release.press-release',compact('press_releases'));
    }

    /** Show Blogs  
     * @return Blogs View
    */

    public function blogs()
    {
        $blogs = Blog::where('status',1)->latest()->get();
        return view('web.blog.blog',compact('blogs'));
    }

     /** Show Reviews  
     * @return Reviews View
    */

    public function review()
    {
        $reviews = Review::where('status',1)->latest()->get();
        return view('web.review.review',compact('reviews'));
    }

    /** Show Contacts  
     * @return insert Contacts Into Database
    */

    public function addContact(Request $request)
    {
        $rules = array(
            'contact_name'   => 'required',
            'contact_email' => 'required',
            'contact_subject'=>'required',
            'contact_message' => 'required'
        );
        // dd($error);
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $contact =  new Contact();
        $contact->name = $request->input('contact_name');
        $contact->subject = $request->input('contact_subject');
        $contact->email = $request->input('contact_email');
        $contact->message = $request->input('contact_message');
           
        
        if($contact->save()){
            return response()->json(['success' => 'Your Inquiry Has Been Registered Successfully.']);
        }
    }

    public function addRegister(Request $request)
    {
        // dd($request);
        $rules = array(
            'name'  => 'required',
            'email' => 'required',
            'phone' =>'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $register =  new UserDetail();
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->phone = $request->input('phone');
        $register->social_media = $request->input('social_media');
        $register->product = $request->input('product');
        $register->subject = $request->input('subject');
        $register->message = $request->input('message');
           
        
        if($register->save()){
            return redirect()->route('web.register')->with('message','Registration Successfully');
        }
    }

    /** Show Blog Details  
     * @return Blog Details View
    */
    public function blogDetail($blog_id)
    {
        $blog_detail = Blog::findOrFail($blog_id);
        // dd($blog_detail);
        return view('web.blog.blog-detail',compact('blog_detail'));     
    }

    /** Show Press Release Details  
     * @return Press Release Details View
    */
    public function pressDetail($press_id)
    {
        $press_details = PressRelease::findOrFail($press_id);
        return view('web.press-release.press-detail',compact('press_details'));
    }

    public function doctors()
    {
        $doctors = Doctor::latest()->get();
        $specialities = Speciality::where('status',1)->get();
        return view('web.doctor.doctor',compact('doctors','specialities'));
    }

    public function search($speciality_id)
    {
        $doctors = DoctorSpeciality::rightjoin('doctors','doctors.id','=','doctor_specialities.doctor_id')
                ->rightjoin('specialities','specialities.id','=','doctor_specialities.speciality_id')
                ->where('doctor_specialities.speciality_id',$speciality_id)
                ->select('doctors.id as doctor_id','doctors.degree as degree','doctors.name as name','doctors.experience as experience','doctors.photo as photo','doctors.has_location as has_location','doctors.location as location','specialities.name as speciality_name')
                ->get();
        
       
        if($doctors && count($doctors)>0){
            return $doctors;
        }else{
            return 1;
        }
    }

    public function doctorDetails($doctor_id)
    {
        $doctor_details = Doctor::findOrFail($doctor_id);
        return view('web.doctor.doctor-detail',compact('doctor_details'));
    }

    public function bookDoctor(Request $request)
    {
        $rules = array(
            'name'   => 'required',
            'date' => 'required',
            'phone'=>'required|numeric|digits:10',
            'doctor_id' => 'required|numeric'
           
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $appointment =  new DoctorAppointment();
        $appointment->name = $request->input('name');
        $appointment->date = $request->input('date');
        $appointment->phone = $request->input('phone');
        $appointment->about = $request->input('about');
        $appointment->doctor_id = $request->input('doctor_id');
           
        
        if($appointment->save()){
            return response()->json(['success' => 'Your Appointment Has Been Registered Successfully.']);
        }
    }

    public function addRandomInfo(Request $request)
    {
        $rules = array(
            'name'   => 'required',
            'date' => 'required',
            'phone'=>'required|numeric|digits:10'
           
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $appointment =  new RandomInfo();
        $appointment->name = $request->input('name');
        $appointment->date = $request->input('date');
        $appointment->phone = $request->input('phone');
        $appointment->about = $request->input('about');
           
        
        if($appointment->save()){
            return response()->json(['success' => 'Success']);
        }
    }

    public function why()
    {
        $why = Why::where('id', 1)->first();
        return view('web.about.why',compact('why'));
    }

    public function about()
    {   $id = 1;
        $about = About::find($id);
        return view('web.about',compact('about'));
    }

    public function history()
    {
        $history = History::where('id', 1)->first();
        return view('web.about.history',compact('history'));
    }

    public function management()
    {
        $management = Management::where('id', 1)->first();
        return view('web.about.management',compact('management'));
    }

    public function hse()
    {
        $hse = Hse::where('id', 1)->first();
        return view('web.about.hse',compact('hse'));
    }

    public function innovation()
    {
        $innovation = Innovation::where('id', 1)->first();
        return view('web.about.innovation',compact('innovation'));
    }

    public function idea()
    {
        $idea = Idea::where('id', 1)->first();
        return view('web.about.idea',compact('idea'));
    }

    public function product()
    {
        $product = Product::where('id', 1)->first();
        return view('web.about.product',compact('product'));
    }

    public function service()
    {
        $service = Service::where('id', 1)->first();
        return view('web.about.service',compact('service'));
    }

    public function media()
    {
        $media = Media::where('id', 1)->first();
        return view('web.about.media',compact('media'));
    }

    public function what()
    {
        $what = What::where('id', 1)->first();
        return view('web.about.what',compact('what'));
    }

    public function press()
    {
        $press = Press::where('id', 1)->first();
        return view('web.about.press',compact('press'));
    }

    public function video()
    {
        $video = Video::where('id', 1)->first();
        return view('web.about.video',compact('video'));
    }

    public function social()
    {
        $social = Social::where('id', 1)->first();
        return view('web.about.social',compact('social'));
    }

    public function export()
    {
        $export = Export::where('id', 1)->first();
        return view('web.about.export',compact('export'));
    }

    public function east()
    {
        $east = East::where('id', 1)->first();
        return view('web.about.east',compact('east'));
    }

    public function west()
    {
        $west = West::where('id', 1)->first();
        return view('web.about.west',compact('west'));
    }

    public function career()
    {
        $career = Career::where('id', 1)->first();
        return view('web.about.career',compact('career'));
    }

    public function investor()
    {
        $investor = Investor::where('id', 1)->first();
        return view('web.about.investor',compact('investor'));
    }

    public function partner()
    {
        $partner = Partner::where('id', 1)->first();
        return view('web.about.partner',compact('partner'));
    }

    public function employee()
    {
        $employee = Employee::where('id', 1)->first();
        return view('web.about.employee',compact('employee'));
    }

    public function csr()
    {
        $csr = Csr::where('id', 1)->first();
        return view('web.about.csr',compact('csr'));
    }

    public function health()
    {
        $health = Health::where('id', 1)->first();
        return view('web.about.health',compact('health'));
    }

    public function safety()
    {
        $safety = Safety::where('id', 1)->first();
        return view('web.about.safety',compact('safety'));
    }

    public function enviroment()
    {
        $enviroment = Enviroment::where('id', 1)->first();
        return view('web.about.enviroment',compact('enviroment'));
    }

    public function activities()
    {
        $activities = Activities::where('id', 1)->first();
        return view('web.about.activities',compact('activities'));
    }
}
