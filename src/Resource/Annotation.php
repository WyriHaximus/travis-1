<?php declare(strict_types=1);

namespace ApiClients\Client\Travis\Resource;

use ApiClients\Foundation\Hydrator\Annotations\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;

/**
 * @EmptyResource("EmptyAnnotation")
 */
abstract class Annotation extends AbstractResource implements AnnotationInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $job_id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return int
     */
    public function id() : int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function jobId() : int
    {
        return $this->job_id;
    }

    /**
     * @return string
     */
    public function description() : string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function url() : string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function status() : string
    {
        return $this->status;
    }
}
