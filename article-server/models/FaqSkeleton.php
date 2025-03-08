<?php
class FaqSkeleton
{
    public int $id;
    public string $quest;
    public string $ans;

    public function __construct(int $id, string $quest, string $ans)
    {
        $this->id = $id;
        $this->quest = $quest;
        $this->ans = $ans;
    }
}