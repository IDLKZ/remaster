<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Main;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $main = Main::latest()->first();
        if ($main) {
            $main = $main->toArray();
        } else {
            $main['title'] = 'Капитальный ремонт квартир по индивидуальному дизайн‑проекту';
            $main['subtitle'] = '<ul><li>- Фиксированные сроки и стоимость</li><li>- Индивидуальный дизайн-проект</li><li>- Персональный архитектор</li></ul>';
            $main['background'] = '/img/main-bg.png';
        }
        $about = About::latest()->first();
        if ($about) {
            $about = $about->toArray();
        } else {
            $about['title'] = 'Мы предлагаем ремонт и строительство “под ключ”.';
            $about['subtitle'] = 'Мы - профессионалы в сфере отделки с многолетним опытом работы на десятках строительных объектов по всему миру. Каждый специалист Бюро ремонта отлично знает своё дело и занимается только им.';
            $about['skill'] = 15;
            $about['skill_title'] = 'Лет на рынке ремонта <br> и строительства';
            $about['projects'] = 90;
            $about['projects_title'] = 'Успешных проектов <br> выполненных в нашей компании';
            $about['warranty'] = '100%';
            $about['warranty_title'] = 'Гарантия качества и сервиса <br> для каждого клиента ';
        }
        $SERVICES = Service::orderBy('id', 'asc')->take(3)->get();
        if ($SERVICES && count($SERVICES) == 3) {
            $services = $SERVICES->toArray();
        } else {
            $services[0]['title'] = 'Косметический ремонт';
            $services[0]['price'] = 'от 15 000тг. за кв.м.';
            $services[0]['description'] = '<ul> <li>- Заделка трещин и сколов на стенах</li> <li>- Грунтование стен и потолка</li> <li>- Покраска потолка</li> <li>- Поклейка обоев или покраска стен</li> <li>- Укладка ламината (линолеума)</li> <li>- Установка новой сантехники</li> <li>- Замена розеток</li> <li>- Уборка в подарок</li> </ul>';
            $services[0]['img'] = 'img/home-1.png';
            $services[1]['title'] = 'Капитальный ремонт';
            $services[1]['price'] = 'от 25 000тг. за кв.м.';
            $services[1]['description'] = '<ul> <li>- Технический дизайн проект</li> <li>- Демонтажные работы</li> <li>- Выравнивание стен и потолка</li> <li>- Шпатлевка стен и потолка</li> <li>- Стяжка пола + наливной пол</li> <li>- Замена электропроводки</li> <li>- Замена труб водоснабжения</li> <li>- Замена радиаторов отопления</li> <li>- Укладка плитки (герамогранита)</li> <li>- Поклейка обоев или покраска стен</li> <li>- Монтаж напольного покрытия</li> <li>- Уборка в подарок</li> </ul>';
            $services[1]['img'] = 'img/home-2.png';
            $services[2]['title'] = 'Ремонт премиум класса';
            $services[2]['price'] = 'от 37 000тг. за кв.м.';
            $services[2]['description'] = '<ul> <li>- Технический дизайн проекта</li> <li>- 3D-визуализация дизайна</li> <li>- Демонтажные работы</li> <li>- Возведение стен из ГКЛ или кирпича</li> <li>- Шпатлевка стен</li> <li>- Многоуровневый потолок</li> <li>- Стяжка пола + наливной пол</li> <li>- Замена электропроводки</li> <li>- Замена труб водоснабжения</li> <li>- Замена радиаторов отопления</li> <li>- Укладка плитки, герамогранита, мрамора</li> <li>- Установка сантехники</li> <li>- Укладка паркета</li> <li>- Декоративное покрытие стен</li> <li>- Уборка квартиры</li> </ul>';
            $services[2]['img'] = 'img/home-3.png';
        }
        $PROJECTS = Project::orderBy('id', 'asc')->take(3)->get();
        if ($PROJECTS && count($PROJECTS) == 3) {
            $projects = $PROJECTS->toArray();
        } else {
            $projects[0]['title'] = 'ул. Кенесары, 12';
            $projects[0]['description'] = 'Стены в спальне покрашены в белый, а в остальных комнатах они серые. Айсулу давно мечтала о граффити в гостиной и специально выбрала такой оттенок в качестве фона.';
            $projects[0]['img'] = 'img/house-1.png';
            $projects[1]['title'] = 'ул. Достык, 16';
            $projects[1]['description'] = 'Изначально в этих апартаментах не было внутренних перегородок. Наши архитекторы помогли Денису сделать подходящую ему планировку. В квартире теперь есть большое общее пространство (кухня-гостиная) и приватные зоны (спальня, детская, небольшая гардеробная и ванная).';
            $projects[1]['img'] = 'img/house-2.png';
            $projects[2]['title'] = 'ул. Акмешит, 9';
            $projects[2]['description'] = 'Хозяйка квартиры Лидия выбрала нейтральную гамму: матовые серые стены, тёмный дубовый паркет Bauwerk. Сложность появляется за счёт контрастных элементов — белых дверей и высокого плинтуса в тон.';
            $projects[2]['img'] = 'img/house-2.png';
        }
        $contact = Contact::latest()->first();

        return view('welcome', compact('main', 'about', 'services', 'projects', 'contact'));
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'phone' => 'required']);
        $_SESSION['phone'] = $request->get('phone');
        $_SESSION['name'] = $request->get('name');
        Mail::send("mail.mail",["title"=>"Заказ с сайта"],function ($message) use ($request){
            $message->to("Aliyagabbassova@gmail.com","Order");
            $message->from('support@nomadkilem.kz', "Номер заказчика: {$request->get('phone')}")->subject('Заказ с сайта');
        });
        toastr()->success('Ваша заявка успешно отправлена!');
        return redirect()->back();
    }
}
