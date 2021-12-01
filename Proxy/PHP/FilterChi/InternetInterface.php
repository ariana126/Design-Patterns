<?php


interface InternetInterface
{
    /**
     * Connects to requested website
     *
     * @param string $website
     * @return void
     */
    public function connectTo(string $website);
}