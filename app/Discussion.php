<?php

namespace App;
use App\Notifications\MarkedAsBestReply;

class Discussion extends Model
{
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
    	return 'slug';
    }


    public function scopeFilterByChannel($builder)
    {
        if (request()->query('channel'))
        {
            $channel=Channel::where('slug',request()->query('channel'))->first();

            if ($channel) {
                return $builder->where('channel_id',$channel->id);
            }            
            return $builder;
        }
        return $builder;
    }

    public function replies()
    {

    	return $this->hasMany(Reply::class);
    }
    public function bestReply()
    {
       return $this->belongsTo(Reply::class,'reply_id');
    }

    public function getBestReply()
    {
       return $this->replies()->find($this->reply_id);
    }

    public function setBestReply(Reply $reply)
    {
        $this->update([
            'reply_id'=>$reply->id,
        ]);
        $reply->user->notify(new MarkedAsBestReply($reply->discussion));

    }
}
