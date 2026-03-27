<?php
/**
 * Created by PhpStorm.
 * User: 786
 * Date: 9/27/2021
 * Time: 2:48 PM
 */
namespace App\Models;
use App\Models\Admin\Customer;
use App\Models\Admin\User;
use App\Models\Client\Papers\Paper;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class Helper
{

    public static function userId()
    {
        $key=rand(10000,99999);
        $generate=true;
        if (User::isExist($key)==true)
        {
            Helper::userId();
            $generate=false;
        }
        if ($generate)
        {
            return $key;
        }
    }

    public static function customerId()
    {
        $key=rand(10000,99999);
        $generate=true;
        if (Customer::isExist($key)==true)
        {
            Helper::customerId();
            $generate=false;
        }
        if ($generate)
        {
            return $key;
        }
    }
    public static function paperId()
    {
        $key=rand(10000,99999);
        $generate=true;
        if (Paper::isExist($key)==true)
        {
            Helper::paperId();
            $generate=false;
        }
        if ($generate)
        {
            return $key;
        }
    }

    public static function imageDelete($image)
    {
        $url=base_path('images').'/'.$image;
        File::delete($url);
    }

    public static function questionTypes()
    {
        return [
                'short','long','story','essay','dialogue','ayat','hadith',
                'application','theme','summary','letter','idiom',
                'stanza','word_meaning','sentence','history','t_urdu',
                'paragraph','tashreeh','talkhees','passive','comprehension',
                'poetry','translate_eng','translate_ur','mf','Synonym',
                'antonym','homophones','formverb','comprehension','pointing',
                'indirect','pair_words','qa','sentence_correction','sp','sentence_completion','matching', 'translate_en', 'punctuation', 'vital'
            ];
    }
    public static function addType1()
    {
        return ['short','long','hadith','ayat','application','letter','poetry','tashreeh','qa','blank','boolean1','matching', 'missing_letter'
        ];
    }
    // ThreeWordsType
    public static function addType2()
    {
        return ['summary', 'vital','story','essay','history','dialogue','theme',
        ];
    }
    // ParagraphsType
    public static function addType3()
    {
        return ['paragraph','comprehension','stanza','talkhees','t_urdu'
        ];
    }
    //5
    public static function addType4()
    {
        return ['Synonym','antonym','sp','mf','formverb','idiom','sentence','pair_words','word_meaning','homophones'
        ];
    }

    //TwoWordsType
    public static function addType5()
    {
        return ['indirect','passive','translate_eng', 'translate_en', 'sentence_correction','translate_ur','sentence_completion'
        ];
    }
    //FourWordsType
    public static function addType6()
    {
        return [''];
    }
    //Tick Correct Spelling

    public static function booleanTypes()
    {
        return ['boolean1','blank', 'missing_letter'];
    }
    public static function mcqTypes()
    {
        return ['mcq','correct_sentences','verb','grammar','meaning','correct_meaning','preposition','spell', 'correct_synonyms' ];
    }
    public static function types($key)
    {
        if ($key!=null)
        {
            if (in_array($key,Helper::questionTypes()))
            {
                return Helper::questionTypes();
            }else if(in_array($key,Helper::booleanTypes()))
            {
                return Helper::booleanTypes();
            }
            else if(in_array($key,Helper::mcqTypes()))
            {
                return Helper::mcqTypes();
            }
        }else{
            return [];
        }

    }

    public static function client()
    {
        return Session::get('client');
    }
    public static function removeSession()
    {
        Session::forget('generate128');
        Session::forget('form');
        Session::forget('edit00-paper');
        Session::forget('q_id');
    }

    public static function expiry()
    {
        $school = Session::get('school');
        $today=Carbon::parse(Carbon::now());
        $expiry=Carbon::parse($school->expired_at);
        $days = $today->diffInDays($expiry);
//        return $expiry->diffForHumans();
        if ($today->gt($expiry))
        {
             return 0;
          
        }else{
             return $days;
        }

    }

}