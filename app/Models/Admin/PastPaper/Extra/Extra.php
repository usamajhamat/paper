<?php

namespace App\Models\Admin\PastPaper\Extra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Extra extends Model
{
    use HasFactory;

    /********** Boards *********************/

    public static function addBoard($data)
    {
        return DB::table('boards')->insertGetId($data);
    }
    public static function boardsList()
    {
        return DB::table('boards')->get();
    }
    public static function boardById($id)
    {
        return DB::table('boards')->where('board_id',$id)->first();
    }
    public static function edit($boardId,$data)
    {
        return DB::table('boards')->where('board_id',$boardId)->update($data);
    }
    public static function remove($boardId)
    {
        return DB::table('boards')->where('board_id',$boardId)->delete();
    }

    /*********** End Boards *****************/

    /********** Board Classes *********************/

    public static function addClass($data)
    {
        return DB::table('board_classes')->insertGetId($data);
    }
    public static function classesList()
    {
        return DB::table('board_classes')->get();
    }
    public static function classById($id)
    {
        return DB::table('board_classes')->where('class_id',$id)->first();
    }
    public static function editClass($classId,$data)
    {
        return DB::table('board_classes')->where('class_id',$classId)->update($data);
    }
    public static function removeClass($classId)
    {
        return DB::table('board_classes')->where('class_id',$classId)->delete();
    }

    /*********** End Board Classes *****************/


    /********** Board Subjects *********************/

    public static function addSubject($data)
    {
        return DB::table('board_subjects')->insertGetId($data);
    }
    public static function SubjectList()
    {
        return DB::table('board_subjects')->get();
    }
    public static function SubjectById($id)
    {
        return DB::table('board_subjects')->where('subject_id',$id)->first();
    }
    public static function editSubject($subjectId,$data)
    {
        return DB::table('board_subjects')->where('subject_id',$subjectId)->update($data);
    }
    public static function removeSubject($subjectId)
    {
        return DB::table('board_subjects')->where('subject_id',$subjectId)->delete();
    }

    /*********** End Board Subject *****************/


    /********** Paper Shift *********************/

    public static function addShift($data)
    {
        return DB::table('shifts')->insertGetId($data);
    }
    public static function ShiftList()
    {
        return DB::table('shifts')->get();
    }
    public static function ShiftById($id)
    {
        return DB::table('shifts')->where('shift_id',$id)->first();
    }
    public static function editShift($shiftId,$data)
    {
        return DB::table('shifts')->where('shift_id',$shiftId)->update($data);
    }
    public static function removeShift($shiftId)
    {
        return DB::table('shifts')->where('shift_id',$shiftId)->delete();
    }

    /*********** End Paper Shift *****************/


    /********** Paper Type *********************/

    public static function addType($data)
    {
        return DB::table('paper_types')->insertGetId($data);
    }
    public static function TypeList()
    {
        return DB::table('paper_types')->get();
    }
    public static function TypeById($id)
    {
        return DB::table('paper_types')->where('type_id',$id)->first();
    }
    public static function editType($typeId,$data)
    {
        return DB::table('paper_types')->where('type_id',$typeId)->update($data);
    }
    public static function removeType($typeId)
    {
        return DB::table('paper_types')->where('type_id',$typeId)->delete();
    }

    /*********** End Paper Type *****************/


    /********** Notifications *********************/

    public static function addNotification($data)
    {
        return DB::table('notifications')->insertGetId($data);
    }
    public static function NotificationList()
    {
        return DB::table('notifications')->get();
    }
    public static function notificationById($id)
    {
        return DB::table('notifications')->where('notification_id',$id)->first();
    }
    public static function editNotification($typeId,$data)
    {
        return DB::table('notifications')->where('notification_id',$typeId)->update($data);
    }
    public static function removeNotification($typeId)
    {
        return DB::table('notifications')->where('notification_id',$typeId)->delete();
    }
    public static function NotificationPanelsList()
    {
        return DB::table('notification_panels')->where('id',1)->first();
    }

    /*********** End Notifications *****************/

    /********** Alerts *********************/

    public static function addAlert($data)
    {
        return DB::table('alerts')->insertGetId($data);
    }
    public static function alertList()
    {
        return DB::table('alerts')->get();
    }
    public static function alertById($id)
    {
        return DB::table('alerts')->where('alert_id',$id)->first();
    }
    public static function editAlert($typeId,$data)
    {
        return DB::table('alerts')->where('alert_id',$typeId)->update($data);
    }
    public static function removeAlert($typeId)
    {
        return DB::table('alerts')->where('alert_id',$typeId)->delete();
    }

    /*********** End Alerts *****************/
}
