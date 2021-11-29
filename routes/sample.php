<?php


/**
 * ルーティング
 * https://readouble.com/laravel/5.7/ja/routing.html
 */

//
Route::name('group.')->prefix('group')->namespace('Group')->middleware('auth')->group(function(){
    //
    Route::namespace('Components')->group(function(){
        Route::get('location/index/{group_types}', 'LocationController@index')->name('location.index');
        Route::get('map/shelter_and_danger_spot', 'MapController@mapShelterAndDangerSpot')->name('map.shelter_and_danger_spot');
    });

    //
    Route::prefix('{group}')->group(function(){
        //
        Route::namespace('Components')->group(function(){
            //
            Route::get('map/get_info_window_html', 'MapController@getInfoWindowHtml')->name('map.get_info_window_html');
            //    
            Route::get('location/show', 'LocationController@show')->name('location.show');
            Route::get('location/edit', 'LocationController@edit')->name('location.edit');
            Route::put('location', 'LocationController@update')->name('location.update');
            Route::post('location/set_here', 'LocationController@setHere')->name('location.set_here');
            //
            Route::put('announcement/send', 'AnnouncementController@send')->name('announcement.send');
            Route::get('announcement/{announcement}/show', 'AnnouncementController@show')->name('announcement.show');

            //
            Route::post('uploadImg', 'UploadController@uploadImg')->name('uploadImg');
            Route::delete('deleteImg', 'UploadController@deleteImg')->name('deleteImg');
            
            //
            Route::get('extra_group/set/{extra_name}', 'ExtraGroupController@set')->name('extra_group.set');
            Route::get('extra_group/unset/{extra_name}', 'ExtraGroupController@unset')->name('extra_group.unset');

            //
            Route::get('user/{user}/rescue', 'RescueController@rescue')->name('user.rescue');
            Route::get('user/{user}/unrescue', 'RescueController@unrescue')->name('user.unrescue');
            Route::get('user/{user}/rescued', 'RescueController@rescued')->name('user.rescued');
            Route::get('user/{user}/reverse_rescue', 'RescueController@reverseRescue')->name('user.reverse_rescue');
            
        });
    });

});





