<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\HpText;
use Illuminate\View\View;
use App\Services\ContentMasterService;
use App\Services\ContentDataService;

class HomeController extends Controller
{
    protected $contentMaster;
    protected $contentData;

    public function __construct(ContentMasterService $contentMaster, ContentDataService $contentData)
    {
        $this->contentMaster = $contentMaster;
        $this->contentData = $contentData;
    }
    /**
     * ホーム画面を表示
     */
    public function index(): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuTitle = Image::where('view_flg', 'MENU_ICON')->first();

        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        // フッター画像を取得
        $footerImage = Image::where('view_flg', 'FOOTER_background')->first();

        // タイトル
        $titleInitiatives = Image::where('view_flg', 'TITLE_initiatives')->first();
        $titleStores = Image::where('view_flg', 'TITLE_stores')->first();
        $titleAbout = Image::where('view_flg', 'TITLE_about')->first();
        $titleRecruit = Image::where('view_flg', 'TITLE_recruit')->first();

        $imgMobile = Image::where('view_flg', 'HOME_img_mobile')->first();
        $imgPc = Image::where('view_flg', 'HOME_img_pc')->first();
        $imgUnder = Image::where('view_flg', 'HOME_img_under')->first();
        $imgSoil = Image::where('view_flg', 'HOME_background0')->first();

        $button0 = Image::where('view_flg', 'HOME_button0')->first();
        $background1 = Image::where('view_flg', 'HOME_background1')->first();
        $button1 = Image::where('view_flg', 'HOME_button1')->first();
        $background2 = Image::where('view_flg', 'HOME_background2')->first();
        $storeImg1 = Image::where('view_flg', 'HOME_store_img1')->first();
        $storeImg2 = Image::where('view_flg', 'HOME_store_img2')->first();
        $background3 = Image::where('view_flg', 'HOME_background3')->first();
        $button3 = Image::where('view_flg', 'HOME_button3')->first();
        $background4 = Image::where('view_flg', 'HOME_background4')->first();
        $button4 = Image::where('view_flg', 'HOME_button4')->first();

        // 採用案内背景
        $recruitBackground = Image::where('view_flg', 'RECRUIT_background')->first();


        // アイコン画像
        $bird = Image::where('view_flg', 'ICON_bird')->first();
        $car = Image::where('view_flg', 'ICON_car')->first();
        $person1 = Image::where('view_flg', 'HOME_person1')->first();
        $person2 = Image::where('view_flg', 'HOME_person2')->first();
        $balloon = Image::where('view_flg', 'ICON_balloon')->first();
        $bird2 = Image::where('view_flg', 'ICON_bird2')->first();

        // 本文
        $TopText = HpText::where('hp_text_id', 'HOME_TOP')->first();

        $options = [
            ['priority', true],
            ['created_at', true]
        ];
        $initiativeContents = $this->contentData->getContentByMasterId('T004', 3, [], $options);


        return view('home', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuItem',
            'menuButton',
            'menuTitle',
            'footerImage',
            'bird',
            'imgMobile',
            'imgPc',
            'imgUnder',
            'button0',
            'background1',
            'button1',
            'background2',
            'storeImg1',
            'storeImg2',
            'background3',
            'button3',
            'background4',
            'button4',
            'TopText',
            'titleInitiatives',
            'titleStores',
            'titleAbout',
            'titleRecruit',
            'car',
            'person1',
            'person2',
            'initiativeContents',
            'imgSoil',
            'balloon',
            'bird2',
            'recruitBackground'
        ));
    }
}
