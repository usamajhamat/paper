<?php

namespace App\Http\Controllers\Admin\PastPaper\Extra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PastPaper\Extra\ExtraReq;
use App\Models\Admin\PastPaper\Extra\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    public function extraList()
    {
        return view('admin.past.extra.extra-list',
                       [
                         'boards'=>Extra::boardsList(),
                         'classes'=>Extra::classesList(),
                         'subjects'=>Extra::SubjectList(),
                         'shifts'=>Extra::ShiftList(),
                         'types'=>Extra::TypeList(),
                         'notifications'=>Extra::NotificationList(),
                         'notificationpanels'=>Extra::NotificationPanelsList(),
                         'alerts'=>Extra::alertList(),
                       ]
            );
    }
    /*******Boards*********/
     public function addBoard(ExtraReq $req)
     {
        $data=['board_name'=>$req->name];
        $boardId=Extra::addBoard($data);
        $location=$req->location;
        $html=view('admin.past.extra.board-partial',
             [
                 'boards'=>Extra::boardsList(),
                 'boardId'=>$boardId,
                 'location'=>$location
             ]
         )->render();

        if ($boardId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'board']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'board']);
        }
     }

     public function editBoard($boardId)
     {
         return response()->json(
             [
                 'data'=>Extra::boardById($boardId),
                 'url'=>route('board-update'),
                 'title'=>'Update Board',
                 'type'=>'board'
             ]
         );
     }
    public function updateBoard(ExtraReq $req)
    {
        $data=['board_name'=>$req->name];
        $boardId=Extra::edit($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.board-partial',
            [
                'boards'=>Extra::boardsList(),
                'boardId'=>$boardId,
                'location'=>$location
            ]
        )->render();

        if ($boardId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'board']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'board']);
        }
    }

    public function removeBoard($boardId)
    {
        $boardId=Extra::remove($boardId);
        $html=view('admin.past.extra.board-partial',
            [
                'boards'=>Extra::boardsList(),
                'boardId'=>$boardId,
                'location'=>'modal'
            ]
        )->render();

        if ($boardId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'board']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'board']);
        }
    }


    /*******end Boards*********/

    /*******Classes*********/
    public function addClass(ExtraReq $req)
    {
        $data=['class_name'=>$req->name];
        $classId=Extra::addClass($data);
        $location=$req->location;
        $html=view('admin.past.extra.class-partial',
            [
                'classes'=>Extra::classesList(),
                'classId'=>$classId,
                'location'=>$location
            ]
        )->render();

        if ($classId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'class']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'class']);
        }
    }

    public function editClass($classId)
    {
        return response()->json(
            [
                'data'=>Extra::classById($classId),
                'url'=>route('board-class-update'),
                'title'=>'Update Class',
                'type'=>'class'
            ]
        );
    }
    public function updateClass(ExtraReq $req)
    {
        try
        {
            $data=['class_name'=>$req->name];
            $classId=Extra::editClass($req->id,$data);
            $location=$req->location;
            $html=view('admin.past.extra.class-partial',
                [
                    'classes'=>Extra::classesList(),
                    'classId'=>$classId,
                    'location'=>$location
                ]
            )->render();

            if ($classId)
            {
                return response()->json(['data'=>$html,'status'=>true,'type'=>'class']);
            }else{
                return response()->json(['data'=>$html,'status'=>false,'type'=>'class']);
            }
        }catch (\Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    public function removeClass($classId)
    {
        try
        {
            $classId=Extra::removeClass($classId);
            $html=view('admin.past.extra.class-partial',
                [
                    'classes'=>Extra::classesList(),
                    'location'=>'modal'
                ]
            )->render();

            if ($classId)
            {
                return response()->json(['data'=>$html,'status'=>true,'type'=>'class']);
            }else{
                return response()->json(['data'=>$html,'status'=>false,'type'=>'class']);
            }
        }catch (\Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    /*******end classes*********/

    /*******Subjects*********/
    public function addSubject(ExtraReq $req)
    {
        $data=['subject_name'=>$req->name];
        $subjectId=Extra::addSubject($data);
        $location=$req->location;
        $html=view('admin.past.extra.subject-partial',
            [
                'subjects'=>Extra::SubjectList(),
                'subjectId'=>$subjectId,
                'location'=>$location
            ]
        )->render();

        if ($subjectId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'subject']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'subject']);
        }
    }


    public function editSubject($subjectId)
    {
        return response()->json(
            [
                'data'=>Extra::SubjectById($subjectId),
                'url'=>route('board-subject-update'),
                'title'=>'Update Subject',
                'type'=>'subject'
            ]
        );
    }
    public function updateSubject(ExtraReq $req)
    {
        $data=['subject_name'=>$req->name];
        $subjectId=Extra::editSubject($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.subject-partial',
            [
                'subjects'=>Extra::SubjectList(),
                'subjectId'=>$subjectId,
                'location'=>$location
            ]
        )->render();

        if ($subjectId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'subject']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'class']);
        }
    }

    public function removeSubject($subId)
    {
        $subjectId=Extra::removeSubject($subId);
        $html=view('admin.past.extra.subject-partial',
            [
                'subjects'=>Extra::SubjectList(),
                'location'=>'modal'
            ]
        )->render();

        if ($subjectId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'subject']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'class']);
        }
    }

    /*******end subjects*********/

    /******* Paper Type *********/
    public function addType(ExtraReq $req)
    {
        $data=['type_name'=>$req->name];
        $typeId=Extra::addType($data);
        $location=$req->location;
        $html=view('admin.past.extra.type-partial',
            [
                'types'=>Extra::TypeList(),
                'typeId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'type']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'type']);
        }
    }

    public function editType($typeId)
    {
        return response()->json(
            [
                'data'=>Extra::TypeById($typeId),
                'url'=>route('type-update'),
                'title'=>'Update Paper Type',
                'type'=>'type'
            ]);
    }
    public function updateType(ExtraReq $req)
    {
        $data=['type_name'=>$req->name];
        $typeId=Extra::editType($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.type-partial',
            [
                'types'=>Extra::TypeList(),
                'typeId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'type']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'type']);
        }
    }
    public function removeType($id)
    {
        $typeId=Extra::removeType($id);
        $html=view('admin.past.extra.type-partial',
            [
                'types'=>Extra::TypeList(),
                'location'=>'modal'
            ]
        )->render();

        if ($typeId)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'type']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'type']);
        }
    }

    /*******end Type*********/

    /******* Shift Type *********/
    public function addShift(ExtraReq $req)
    {
        $data=['shift_name'=>$req->name];
        $typeId=Extra::addShift($data);
        $location=$req->location;
        $html=view('admin.past.extra.shift-partial',
            [
                'shifts'=>Extra::ShiftList(),
                'shiftId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'shift']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'shift']);
        }
    }
    public function editShift($shiftId)
    {
        return response()->json(
            [
                'data'=>Extra::ShiftById($shiftId),
                'url'=>route('shift-update'),
                'title'=>'Update Shift',
                'type'=>'shift'

            ]);
    }
    public function updateShift(ExtraReq $req)
    {
        $data=['shift_name'=>$req->name];
        $typeId=Extra::editShift($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.shift-partial',
            [
                'shifts'=>Extra::ShiftList(),
                'shiftId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'shift']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'shift']);
        }
    }

    public function removeShift($id)
    {
        $typeId=Extra::removeShift($id);
        $html=view('admin.past.extra.shift-partial',
            [
                'shifts'=>Extra::ShiftList(),
                'location'=>'modal'
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'shift']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'shift']);
        }
    }


    /*******end Shift *********/


    /******* Notification *********/
    public function addNotification(ExtraReq $req)
    {
        $data=['notification_name'=>$req->name];
        $typeId=Extra::addNotification($data);
        $location=$req->location;
        $html=view('admin.past.extra.notification-partial',
            [
                'notifications'=>Extra::NotificationList(),
                'notificationId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'notification']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'notification']);
        }
    }
    public function editNotification($notificationId)
    {
        return response()->json(
            [
                'data'=>Extra::notificationById($notificationId),
                'url'=>route('notification-update'),
                'title'=>'Update Notification',
                'type'=>'notification'

            ]);
    }
    public function updateNotification(ExtraReq $req)
    {
        $data=['notification_name'=>$req->name];
        $typeId=Extra::editNotification($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.notification-partial',
            [
                'notifications'=>Extra::NotificationList(),
                'notificationId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'notification']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'notification']);
        }
    }

    public function removeNotification($id)
    {
        $typeId=Extra::removeNotification($id);
        $html=view('admin.past.extra.notification-partial',
            [
                'notifications'=>Extra::NotificationList(),
                'location'=>'modal'
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'notification']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'notification']);
        }
    }
    /*******end Notification *********/

    public function statusNotification(Request $request){
        $getnotificationstatus=DB::table('notifications')->where('notification_id',$request->notification_id)->value('notification_status');
        if ($getnotificationstatus==1){
            DB::table('notifications')->where('notification_id',$request->notification_id)->update(['notification_status'=>0]);
            echo 0;
        }
        else{
            DB::table('notifications')->where('notification_id',$request->notification_id)->update(['notification_status'=>1]);
            echo 1;
        }
    }

    public function notificationPanel(Request $request){
        $getnotificationpanelstatus=DB::table('notification_panels')->where('id',$request->notification_id)->value('status');
        if ($getnotificationpanelstatus==1){
            DB::table('notification_panels')->where('id',$request->notification_id)->update(['status'=>0]);
            echo 0;
        }
        else{
            DB::table('notification_panels')->where('id',$request->notification_id)->update(['status'=>1]);
            echo 1;
        }
    }


    /******* Alert *********/
    public function addAlert(ExtraReq $req)
    {
        $data=['alert_name'=>$req->name];
        $typeId=Extra::addAlert($data);
        $location=$req->location;
        $html=view('admin.past.extra.alert-partial',
            [
                'alerts'=>Extra::alertList(),
                'alertId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'alert']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'alert']);
        }
    }
    public function editAlert($alertId)
    {
        return response()->json(
            [
                'data'=>Extra::alertById($alertId),
                'url'=>route('alert-update'),
                'title'=>'Update Alert',
                'type'=>'alert'

            ]);
    }
    public function updateAlert(ExtraReq $req)
    {
        $data=['alert_name'=>$req->name];
        $typeId=Extra::editAlert($req->id,$data);
        $location=$req->location;
        $html=view('admin.past.extra.alert-partial',
            [
                'alerts'=>Extra::alertList(),
                'alertId'=>$typeId,
                'location'=>$location
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'alert']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'alert']);
        }
    }

    public function removeAlert($id)
    {
        $typeId=Extra::removeAlert($id);
        $html=view('admin.past.extra.alert-partial',
            [
                'alerts'=>Extra::alertList(),
                'location'=>'modal'
            ]
        )->render();

        if ($typeId>0)
        {
            return response()->json(['data'=>$html,'status'=>true,'type'=>'alert']);
        }else{
            return response()->json(['data'=>$html,'status'=>false,'type'=>'alert']);
        }
    }
    /*******end Notification *********/

    public function statusAlert(Request $request){
        $getalertstatus=DB::table('alerts')->where('alert_id',$request->alert_id)->value('alert_status');
        if ($getalertstatus==1){
            DB::table('alerts')->where('alert_id',$request->alert_id)->update(['alert_status'=>0]);
            echo 0;
        }
        else{
            DB::table('alerts')->where('alert_id',$request->alert_id)->update(['alert_status'=>1]);
            echo 1;
        }
    }

    public function colorAlert(Request $request){
            DB::table('alerts')->where('alert_id',$request->alert_id)->update(['alert_color'=>$request->alert_color]);
            echo 1;
    }
}
