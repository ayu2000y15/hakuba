<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\HpText;
use App\Services\ContentMasterService;
use App\Services\ContentDataService;

use Illuminate\View\View;

class PageController extends Controller
{
    protected $contentMaster;
    protected $contentData;

    public function __construct(ContentMasterService $contentMaster, ContentDataService $contentData)
    {
        $this->contentMaster = $contentMaster;
        $this->contentData = $contentData;
    }

    /**
     * Display the initiatives page.
     */
    public function initiatives(Request $request): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuTitle = Image::where('view_flg', 'MENU_ICON')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();
        $titleInitiatives = Image::where('view_flg', 'TITLE_initiatives')->first();
        $car = Image::where('view_flg', 'ICON_car')->first();

        $background1 = Image::where('view_flg', 'INI_background')->first();

        $options = [
            ['priority', true],
            ['created_at', true]
        ];

        // ページネーション用のパラメータを取得
        $page = (int) $request->get('page', 1);
        $perPage = 6;

        // 全体のデータを取得
        $allInitiativeContents = $this->contentData->getContentByMasterId('T002', 0, [], $options);
        $totalCount = count($allInitiativeContents);

        // ページネーション用にデータを分割
        $offset = ($page - 1) * $perPage;
        $initiativeContents = array_slice($allInitiativeContents, $offset, $perPage);

        // ページネーション情報を計算
        $totalPages = ceil($totalCount / $perPage);
        $hasNextPage = $page < $totalPages;
        $hasPrevPage = $page > 1;

        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'total_count' => $totalCount,
            'per_page' => $perPage,
            'has_next' => $hasNextPage,
            'has_prev' => $hasPrevPage,
            'next_page' => $hasNextPage ? $page + 1 : null,
            'prev_page' => $hasPrevPage ? $page - 1 : null,
        ];


        return view('initiatives', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuItem',
            'menuTitle',
            'menuButton',
            'background1',
            'initiativeContents',
            'titleInitiatives',
            'car',
            'pagination',
        ));
    }

    /**
     * Display the stores page.
     */
    public function stores(): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuTitle = Image::where('view_flg', 'MENU_ICON')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        $background = Image::where('view_flg', 'STORES_background')->first();
        $storeImg1 = Image::where('view_flg', 'HOME_store_img1')->first();
        $storeImg2 = Image::where('view_flg', 'HOME_store_img2')->first();

        $backgroundPc = Image::where('view_flg', 'HOME_background2')->first();

        $titleStores = Image::where('view_flg', 'TITLE_stores')->first();
        $balloon = Image::where('view_flg', 'ICON_balloon')->first();
        $storeImg1 = Image::where('view_flg', 'HOME_store_img1')->first();
        $storeImg2 = Image::where('view_flg', 'HOME_store_img2')->first();
        $businessHour1 = Image::where('view_flg', 'STORES_Business1')->first();
        $businessHour2 = Image::where('view_flg', 'STORES_Business2')->first();

        return view('stores', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuTitle',
            'menuItem',
            'menuButton',
            'background',
            'storeImg1',
            'storeImg2',
            'backgroundPc',
            'titleStores',
            'balloon',
            'storeImg1',
            'storeImg2',
            'businessHour1',
            'businessHour2'
        ));
    }

    /**
     * Display the about us page.
     */
    public function about(): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuTitle = Image::where('view_flg', 'MENU_ICON')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        $background = Image::where('view_flg', 'ABOUT_background')->first();
        $backgroundPc = Image::where('view_flg', 'HOME_background2')->first();

        $titleAbout = Image::where('view_flg', 'TITLE_about')->first();
        $balloon = Image::where('view_flg', 'ICON_balloon')->first();

        $content1 = Image::where('view_flg', 'ABOUT_content1')->first();
        $content2 = Image::where('view_flg', 'ABOUT_content2')->first();
        $content3 = Image::where('view_flg', 'ABOUT_content3')->first();
        $content4 = Image::where('view_flg', 'ABOUT_content4')->first();

        $button = Image::where('view_flg', 'ABOUT_button')->first();

        return view('about', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuTitle',
            'menuItem',
            'menuButton',
            'background',
            'backgroundPc',
            'titleAbout',
            'balloon',
            'content1',
            'content2',
            'content3',
            'content4',
            'button'
        ));
    }

    /**
     * Display the recruitment page.
     */
    public function recruit(): View
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
        // 募集要項のテキストを取得
        // 募集要項のオプション
        $options = [
            ['priority', true],
            ['created_at', false]
        ];
        $textRecruitment = $this->contentData->getContentByMasterId('T001', 0, [], $options);
        $textRecruitmentLabel = $this->contentData->getContentWithSchema('T001');

        $background = Image::where('view_flg', 'RECRUIT_background')->first();
        $background2 = Image::where('view_flg', 'RECRUIT_background2')->first();

        $titleRecruit = Image::where('view_flg', 'TITLE_recruit')->first();

        $qa = Image::where('view_flg', 'RECRUIT_QA')->orderBy('priority')->get();
        $person = Image::where('view_flg', 'RECRUIT_person')->first();
        $titleBg = Image::where('view_flg', 'RECRUIT_titlebg')->first();
        $mailIcon = Image::where('view_flg', 'ICON_mail')->first();

        $qaTitle = Image::where('view_flg', 'RECRUIT_qa_title')->first();
        $qaContent = Image::where('view_flg', 'RECRUIT_qa_content')->first();
        $mailMobile = Image::where('view_flg', 'RECRUIT_mail_mobile')->first();


        return view('recruit', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuTitle',
            'menuItem',
            'menuButton',
            'textRecruitment',
            'textRecruitmentLabel',
            'background',
            'titleRecruit',
            'background2',
            'qa',
            'person',
            'titleBg',
            'mailIcon',
            'qaTitle',
            'qaContent',
            'mailMobile'
        ));
    }

    /**
     * Display the initiatives detail page.
     */
    public function initiativeDetail($id): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuTitle = Image::where('view_flg', 'MENU_ICON')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();
        $titleInitiatives = Image::where('view_flg', 'TITLE_initiatives')->first();
        $car = Image::where('view_flg', 'ICON_car')->first();

        $background1 = Image::where('view_flg', 'INI_background')->first();
        $btnBackground = Image::where('view_flg', 'BUTTON_bg')->first();

        // 特定のコンテンツを取得
        $options = [
            ['priority', true],
            ['created_at', true]
        ];

        $initiativeContent = $this->contentData->getContentByMasterId('T002', 0, [], $options, $id);

        // 前後の投稿を取得
        $allInitiatives = $this->contentData->getContentByMasterId('T002', 0, [], $options);
        $currentIndex = -1;
        $previousPost = null;
        $nextPost = null;

        // 現在の投稿のインデックスを見つける
        foreach ($allInitiatives as $index => $initiative) {
            if ($initiative->id == $id) {
                $currentIndex = $index;
                break;
            }
        }

        // 前の投稿と次の投稿を設定
        if ($currentIndex > 0) {
            $previousPost = $allInitiatives[$currentIndex - 1];
        }
        if ($currentIndex < count($allInitiatives) - 1) {
            $nextPost = $allInitiatives[$currentIndex + 1];
        }

        return view('initiatives-detail', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuItem',
            'menuTitle',
            'menuButton',
            'background1',
            'initiativeContent',
            'titleInitiatives',
            'car',
            'previousPost',
            'nextPost',
            'btnBackground'
        ));
    }
}
