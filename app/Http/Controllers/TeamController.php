<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function tech_web_add_team()
    {
        return view('admin.team.team',[
            'teams'=>Team::get()
        ]);

    }

    public function tech_web_store_team(Request $request)
    {
        Team::save_team($request);
        return back()->with('message','Team added successfully');
    }

    public function tech_web_edit_team($id)
    {
        return view('admin.team.edit_team',[
            'team'=>Team::find($id),
        ]);
    }

    public function tech_web_update_team(Request $request)
    {
        Team::update_team($request);
        return back()->with('message','Team update successfully');
    }


//    ----

    public function tech_web_add_menu()
    {
        return view('admin.menu.menu',[
            'menus'=>Menu::get()
        ]);

    }

    public function tech_web_store_menu(Request $request)
    {
        Menu::save_menu($request);
        return back()->with('message','Menu added successfully');
    }

    public function tech_web_edit_menu($id)
    {
        return view('admin.menu.edit_menu',[
            'menu'=>Menu::find($id),
        ]);
    }

    public function tech_web_update_menu(Request $request)
    {

        Menu::update_menu($request);
        return back()->with('message','Menu update successfully');
    }

    //    ----

    public function tech_web_add_sub_menu()
    {
        return view('admin.menu.sub_menu',[
            'sub_menus'=>SubMenu::get()
        ]);

    }

    public function tech_web_store_sub_menu(Request $request)
    {
        SubMenu::save_sub_menu($request);
        return back()->with('message','sub_Menu added successfully');
    }

    public function tech_web_edit_sub_menu($id)
    {
        return view('admin.menu.edit_sub_menu',[
            'sub_menu'=>SubMenu::find($id),
        ]);
    }

    public function tech_web_update_sub_menu(Request $request)
    {

        SubMenu::update_sub_menu($request);
        return back()->with('message','sub_Menu update successfully');
    }
}
