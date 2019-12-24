<?php 
namespace App;

/**
 * #25 eposide
 */
trait RecordsActivity
{
    // This Records automatically start booting 

    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return ;
        
        foreach(static::getActivityRecords() as $event) {
            static::$event(function ($model) use ($event){
                $model->recordActivity($event);
            });
        }

    }

    protected static function getActivityRecords(){
        return ['created'];
    }

    public function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type'=>$this->getActivityType($event)
        ]);

        // Activity::create([
        //     'user_id' => auth()->id(), 
        //     'type' => $this->getActivityType($event),
        //     'subject_id' =>$this->id,
        //     'subject_type' => get_class($this)
        // ]);
    }

    public function activity(){
        // send to activityp type and id is related to
        return $this->morphMany('App\Activity', 'subject');
    }

    public function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        
        return "{$event}_{$type}";
    }
        
}
