<?php 
namespace Forum;

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
        // #28 added this because when deleted thread activity not deleted
        static::deleting(function ($model) {
            $model->activity()->delete();
        });

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
        return $this->morphMany('Forum\Activity', 'subject');
    }

    public function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        
        return "{$event}_{$type}";
    }
        
}
