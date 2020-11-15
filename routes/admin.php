<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin routs
|--------------------------------------------------------------------------
*/
error_reporting(0);
define('PAGINATE',10);
Route::group(['namespace' =>'Admin','prefix' => 'login' , 'middleware' => 'guest:admin' ],function(){
    Route::get('/' , 'LogController@index') -> name('admin.login');
    Route::post('/' , 'LogController@req');


});
Route::group(['namespace' => 'Admin' ,'middleware' => 'auth:admin'],function(){

    Route::get('/','IndexController@index') -> name('admin.index');
    #######begin leagues routes ################################################
    Route::group(['prefix' => 'leagues'],function(){
        Route::get('/','LeaguesController@index') -> name('admin.leagues');
        Route::post('/' , 'LeaguesController@add') -> name('admin.leagues.add');
        Route::get('edit/{id_ed}' , 'LeaguesController@editView') -> name('admin.leagues.editView');
        Route::post('edit' , 'LeaguesController@edit') -> name('admin.leagues.edit');
        Route::get('delete/{id}' , 'LeaguesController@delete') -> name('admin.leagues.delete');
        Route::group(['prefix' => 'teams'] , function(){
            Route::get('/{league_id}','LeaguesController@teamsView')-> name('admin.leagues.teamsView');
            Route::post('addLeagueTeams/','LeaguesController@teamsLeagueAdd')-> name('admin.leagues.teams.add');
            Route::get('editLeagueTeams/{team_id}','LeaguesController@teamsLeagueEditView')-> name('admin.leagues.teams.edit');
            Route::post('editLeagueTeams','LeaguesController@teamsLeagueDoEdit')-> name('admin.leagues.teams.doEdit');
            Route::get('deleteLeagueTeams/{id}','LeaguesController@teamsLeagueDelete')-> name('admin.leagues.teams.delete');
        });

    });
    ##############################end leagues routes #########################
    #####################tbdays routes ######################################
    Route::group(['prefix' => 'tables'] , function(){

        Route::get('/tbDays','TbDaysController@index')-> name('admin.tbDays.View');
        Route::post('/tbDays','TbDaysController@createDay')-> name('admin.tbDays.create');
        Route::get('tbDays_edit/{id}','TbDaysController@editDayView')-> name('admin.tbDays.editView');
        Route::post('tbDays_edit','TbDaysController@doEditDay')-> name('admin.tbDays.doEditDay');
        Route::get('tbDays_delete/{id}','TbDaysController@DeleteDay')-> name('admin.tbDays.delete');

        Route::get('tbMatches/{id}','TbMatchesController@tbMatchesView')-> name('admin.tbDays.tbMatches');
        Route::post('tbMatches/','TbMatchesController@tbMatchesCreate')-> name('admin.tbMatches.create');
        Route::get('tbMatchesDelete/{id}','TbMatchesController@tbMatchesDelete')-> name('admin.tbMatches.delete');
        Route::get('tbMatchesSources/{id}','TbMatchesController@tbMatchesSourcesView')-> name('admin.tbMatches.sourcesView');
        Route::post('tbMatchesSources/','TbMatchesController@tbMatchesSources')-> name('admin.tbMatches.sourcesAdd');
        Route::get('tbMatchesSourcesDelete/{id}','TbMatchesController@tbMatchesSourcesDelete')-> name('admin.tbMatches.sources.delete');

        Route::get('set_today','ActiveTablesController@setTodayView') -> name('admin.tables.setTodayView');
        Route::post('set_today','ActiveTablesController@setToday') -> name('admin.tables.setToday');

        Route::get('set_tomorrow','ActiveTablesController@setTomorrowView') -> name('admin.tables.setTomorrowView');
        Route::post('set_tomorrow','ActiveTablesController@setTomorrow') -> name('admin.tables.setTomorrow');

        Route::get('set_yesterday','ActiveTablesController@setYesterdayView') -> name('admin.tables.setYesterdayView');
        Route::post('set_yesterday','ActiveTablesController@setYesterday') -> name('admin.tables.setYesterday');

        ###########ajax routes##########################################

        Route::get('/activeMatch','AjaxController@activeMatch') -> name('admin.activeMatch');
        Route::get('/selectionChange','AjaxController@selectionLeagueTeam') -> name('admin.tbMatches.selectChange');
        Route::get('/activeFinished','AjaxController@activeFinished') -> name('admin.activeFinished');

    });

    Route::get('/logout','LogController@logout')->name('admin.logout');
});
