<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\HpText;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the initiatives page.
     */
    public function initiatives(): View
    {
        // ロゴ画像を取得
        $logo1 = Image::where('view_flg', 'LOGO1')->first();
        $logo2 = Image::where('view_flg', 'LOGO2')->first();

        // スマホ用のメニューアイコンとメニュー項目を取得
        $menuIcon = Image::where('view_flg', 'MENU_hamburger')->first();
        $menuBackground = Image::where('view_flg', 'MENU_background')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        // フッター画像を取得
        $footerImage = Image::where('view_flg', 'FOOTER_background')->first();

        return view('initiatives', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuBackground',
            'menuItem',
            'menuButton',
            'footerImage'
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
        $menuBackground = Image::where('view_flg', 'MENU_background')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        // フッター画像を取得
        $footerImage = Image::where('view_flg', 'FOOTER_background')->first();
        return view('stores', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuBackground',
            'menuItem',
            'menuButton',
            'footerImage'
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
        $menuBackground = Image::where('view_flg', 'MENU_background')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        // フッター画像を取得
        $footerImage = Image::where('view_flg', 'FOOTER_background')->first();
        return view('about', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuBackground',
            'menuItem',
            'menuButton',
            'footerImage'
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
        $menuBackground = Image::where('view_flg', 'MENU_background')->first();
        $menuItem = Image::where('view_flg', 'MENU_ITEM')->orderBy('priority')->get();
        $menuButton = Image::where('view_flg', 'MENU_button1')->first();

        // フッター画像を取得
        $footerImage = Image::where('view_flg', 'FOOTER_background')->first();
        return view('recruit', compact(
            'logo1',
            'logo2',
            'menuIcon',
            'menuBackground',
            'menuItem',
            'menuButton',
            'footerImage'
        ));
    }
}
