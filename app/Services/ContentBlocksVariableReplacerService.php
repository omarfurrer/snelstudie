<?php

namespace App\Services;

use App\Repositories\Interfaces\ContentBlocksRepositoryInterface;
use App\Services\CitiesVariablesValueExtractorService;
use App\Models\ContentBlock;

class ContentBlocksVariableReplacerService {

    /**
     * @var ContentBlocksRepositoryInterface 
     */
    protected $contentBlocksRepository;

    /**
     * @var CitiesVariablesValueExtractorService 
     */
    protected $citiesVariablesValueExtractorService;

    /**
     * ContentBlocksVariableReplacerService Constructor.
     * 
     * @param ContentBlocksRepositoryInterface $contentBlocksRepository
     * @param CitiesVariablesValueExtractorService $citiesVariablesValueExtractorService
     */
    public function __construct(ContentBlocksRepositoryInterface $contentBlocksRepository, CitiesVariablesValueExtractorService $citiesVariablesValueExtractorService)
    {
        $this->citiesVariablesValueExtractorService = $citiesVariablesValueExtractorService;
        $this->contentBlocksRepository = $contentBlocksRepository;
    }

    public function replace($contentBlockCode, $value)
    {
        if (empty($contentBlockCode) || empty($value)) {
            return false;
        }

        if (!is_string($contentBlockCode) || !is_string($value)) {
            return false;
        }

        // Make sure content block exists.
        $contentBlock = $this->contentBlocksRepository->findBy($contentBlockCode, 'code');
        if (!$contentBlock instanceof ContentBlock) {
            return false;
        }

        return preg_replace_callback('/{(.*?)}/',
                                     function($match) use($value) {
            $code = $match[1];
            // check which type of variable it is
            return $this->citiesVariablesValueExtractorService->extract($code, $value);
        }, $contentBlock->content);
    }

}
