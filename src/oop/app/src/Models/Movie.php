<?php

namespace src\oop\app\src\Models;

class Movie implements MovieInterface
{
    private string $title;
    private string $poster;
    private string $description;

    /**
     * Movie constructor.
     * @param string $title
     * @param string $poster
     * @param string $description
     */
    public function __construct(string $title, string $poster, string $description)
    {
        $this->setTitle($title);
        $this->setPoster($poster);
        $this->setDescription($description);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     */
    public function setPoster(string $poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}