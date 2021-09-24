<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

Class ActivityController extends Controller {

        public function __construct(Activity $activity) {

            $this -> activity = $activity;

        }

        public function index() {

            return response() -> json(['Activities' => Activity::all()], 200);
        }

        public function show($activityId) {

            try {

                $activity = Activity::findOrFail($activityId);

                return response() -> json(['Activities' => $activity], 200);

            } catch (\Exception $e){

                return response() -> json(['message' => 'Activity Not Found'], 409);
            }

        }

        public function store(Request $request){

            $this -> validate($request, [
                'task_id' => 'required',
                'title' => 'required|string',
                'type' => 'required',
                'default_value' => 'required|string',
                'min_value' => 'required',
                'max_value' => 'required',
                'value_format' => 'required|string',
                'has_obs' => 'required',
                'mandatory' => 'required',
                'unit' => 'required|string',
                'fill' => 'required',
                'info' => 'required|string',
                'image_url' => 'required|string',
                'photo_gallery' => 'required',
                'fill_order' => 'required',
            ]);

            try {
                $activity = $this -> activity -> create([
                    'task_id' => $request -> input('task_id'),
                    'title' => $request -> input('title'),
                    'type' => $request -> input('type'),
                    'default_value' => $request -> input('default_value'),
                    'min_value' => $request -> input('min_value'),
                    'max_value' => $request -> input('max_value'),
                    'value_format' => $request -> input('value_format'),
                    'has_obs' => $request -> input('has_obs'),
                    'mandatory' => $request -> input('mandatory'),
                    'unit' => $request -> input('unit'),
                    'fill' => $request -> input('fill'),
                    'info' => $request -> input('info'),
                    'image_url' => $request -> input('image_url'),
                    'photo_gallery' => $request -> input('photo_gallery'),
                    'fill_order' => $request -> input('fill_order'),
                ]);

                return response() -> json(['activity' => $activity, 'message' => 'CREATED'], 201);

            } catch (\Exception $e) {

                return response() -> json(['message' => 'USER REGISTRATION FAILED'], 409);

            }
        }

        public function update(Request $request, $activityId){

            $this -> validate($request, [
                'task_id' => 'required',
                'title' => 'required|string',
                'type' => 'required',
                'default_value' => 'required|string',
                'min_value' => 'required',
                'max_value' => 'required',
                'value_format' => 'required|string',
                'has_obs' => 'required',
                'mandatory' => 'required',
                'unit' => 'required|string',
                'fill' => 'required',
                'info' => 'required|string',
                'image_url' => 'required|string',
                'photo_gallery' => 'required',
                'fill_order' => 'required',
            ]);

            $activityId = $this -> $activityId -> find($activityId);

            try {
                $activity = $this -> activity -> update([
                    'task_id' => $request -> input('task_id'),
                    'title' => $request -> input('title'),
                    'type' => $request -> input('type'),
                    'default_value' => $request -> input('default_value'),
                    'min_value' => $request -> input('min_value'),
                    'max_value' => $request -> input('max_value'),
                    'value_format' => $request -> input('value_format'),
                    'has_obs' => $request -> input('has_obs'),
                    'mandatory' => $request -> input('mandatory'),
                    'unit' => $request -> input('unit'),
                    'fill' => $request -> input('fill'),
                    'info' => $request -> input('info'),
                    'image_url' => $request -> input('image_url'),
                    'photo_gallery' => $request -> input('photo_gallery'),
                    'fill_order' => $request -> input('fill_order'),
                ]);

                return response() -> json(['activity' => $activity, 'message' => 'EDITED'], 201);

            } catch (\Exception $e) {

                return response() -> json(['message' => 'USER EDITION FAILED'], 409);

            }

        }

        public function destroy($activityId){

            $activity = $this -> activity -> find($activityId);

            if(empty($activity)){
                return response() -> json (['message' => 'FAILED TO DELETE'], 409);
            }

            $activity -> delete();
            return;

        }
}
