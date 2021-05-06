<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Albums;
use App\Models\AlbumsImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function maincall(Request $request)
    {
        $result = false;

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('maincall')]
        ]);

        if ($validator->fails()) {
            flash()->overlay('Возможно вы бот. Обратитесь за помощью к людям', 'Ошибка ввода Recaptcha');
            return back();
        }

        
            $sender = $request->all();
        if (!empty($sender['client_phone']) && !empty($sender['client_name'])) {
            $sender['filepaths']=false;
            $sender['client_email']=$sender['client_email']??'';

            if($request->file('file')) {

                $sender['filepaths'] = $this->upload($request);

                if (!$sender['filepaths']) {
                    flash()->overlay('Некорректный тип загружаемого файла', 'Некорректный файл');
                    return back();
                }
            }


            Mail::send('emails.maincall', ['sender' => $sender], function ($message) use ($sender) {
                $message->from(setting('site.fromemail'), setting('site.formname'));
                $message->to(setting('site.toemail'));
                $message->subject(setting('site.subjectmaincallemail'));
            });

            $result = true;
        }

        if ($result) {
            flash()->overlay('Заявка отправлена. Наш менеджер свяжется с Вами в ближайшее время', 'Спасибо за заявку!');


            return back();
        } else {
            flash()->overlay('Неправильный ввод данных', 'Заявка не отправлена');

            return back();
        }
    }

    public function call(Request $request)
    {
        $result = false;

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('call')]
        ]);

        if ($validator->fails()) {
            flash()->overlay('Возможно вы бот. Обратитесь за помощью к людям', 'Ошибка ввода Recaptcha');
            return back();
        }

        
            $sender = $request->all();
     if (!empty($sender['client_phone']) && !empty($sender['client_name'])) {
            $sender['filepaths']=false;

            if($request->file('file')) {

                $sender['filepaths'] = $this->upload($request);

                if (!$sender['filepaths']) {
                    flash()->overlay('Некорректный тип загружаемого файла', 'Некорректный файл');
                    return back();
                }
            }

            Mail::send('emails.call', ['sender' => $sender], function($message) use ($sender) {
                $message->from(setting('site.fromemail'),setting('site.formname'));
                $message->to(setting('site.toemail'));
                $message->subject(setting('site.subjectcallemail'));
            });

            $result = true;
        }

        if ($result) {
            flash()->overlay('Заявка отправлена. Наш менеджер свяжется с Вами в ближайшее время', 'Спасибо за заявку!');

            return back();
        } else {
            flash()->overlay('Неправильный ввод данных', 'Заявка не отправлена');

            return back();
        }
    }

    public function upload(Request $request)
    {
        $filepaths=[];

        $validator = Validator::make($request->all(), [
            'file.*' => 'file|mimes:doc,jpg,jpeg,gif,pdf,zip,rar,7z,png,psd'
        ]);

        if ($validator->fails()) {
            return false;
        }

        $files = $request->file('file');

        foreach($files as $file) {
            $upload_folder = 'emailfiles';
            $filepath=$upload_folder;
            $newfile=Storage::disk('public')->put($filepath, $file, 'public');
            $filepaths[]=url(Storage::disk('public')->url($newfile));
        }

        return $filepaths;
    }

    public function moreimages(Request $request)
    {
        $this->data=NULL;

        if ($request->ajax()) {
            $category_id = $request->post('category_id');
            $skip = $request->post('skip');
            $this->data['skip']=$skip+24;
            $this->data['category'] = Category::FindorFail($category_id);
            $this->data['album_images']= Albums::FindorFail($this->data['category']->album_id);
            $this->data['images']=$this->data['album_images']->images_more($skip);
           
            $html = View::make('include.category-gallery-moreimages', $this->data)->render();

            return response()->json(['html' => $html]);
        }


    }

}
