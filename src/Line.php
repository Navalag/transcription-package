<?php

namespace Navalag\Transcriptions;

class Line
{
    public string $timestamp;
    public string $body;
    public int $position;

    public function __construct(int $position, string $timestamp, string $body)
    {
        $this->position = $position;
        $this->body = $body;
        $this->timestamp = $timestamp;
    }

    public function toHtml(): string
    {
        return "<a href=\"?time={$this->beginningTimestamp()}\">{$this->body}</a>";
    }

    public function beginningTimestamp(): string
    {
        preg_match('/^\d{2}:(\d{2}:\d{2})\.\d{3}/', $this->timestamp, $matches);

        return $matches[1];
    }
}
