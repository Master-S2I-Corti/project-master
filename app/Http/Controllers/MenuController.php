<?php

namespace App\Http\Controllers;

use App\ItemMenu;

class MenuController extends Controller
{
    public static function itemsMenu($title, $status)
    {
        $items =ItemMenu::where("type", $status)->get();
        return view('home.menu_page',compact('items','title'));
    }
    public static function menu($title, $status)
    {
        $items =ItemMenu::where("type", $status)->get();
        return view('home.menu',compact('items','title'));
    }
}
