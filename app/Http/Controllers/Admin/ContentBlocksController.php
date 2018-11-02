<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ContentBlocksRepositoryInterface;
use App\Http\Requests\ContentBlocks\StoreContentBlockRequest;
use App\Http\Requests\ContentBlocks\UpdateContentBlockRequest;
use App\Models\ContentBlock;

class ContentBlocksController extends Controller {

    /**
     * @var ContentBlocksRepositoryInterface 
     */
    protected $contentBlocksRepository;

    /**
     * ContentBlocksController Constructor.
     * 
     * @param ContentBlocksRepositoryInterface $contentBlocksRepository
     */
    public function __construct(ContentBlocksRepositoryInterface $contentBlocksRepository)
    {
        $this->contentBlocksRepository = $contentBlocksRepository;
    }

    /**
     * List all content blocks. 
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $contentBlocks = $this->contentBlocksRepository->all();
        return view('admin.content_blocks.index', compact('contentBlocks'));
    }

    /**
     * Load create new content block page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.content_blocks.create');
    }

    /**
     * Store content block.
     * 
     * @param StoreContentBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContentBlockRequest $request)
    {
        $this->contentBlocksRepository->create($request->all());
        return redirect()->to('/admin/content_blocks');
    }

    /**
     * View a content block.
     * 
     * @param ContentBlock $contentBlock
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function show(ContentBlock $contentBlock)
    {
        return view('admin.content_blocks.show', compact('contentBlock'));
    }

    /**
     * Load view to edit a content block.
     * 
     * @param ContentBlock $contentBlock
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function edit(ContentBlock $contentBlock)
    {
        return view('admin.content_blocks.edit', compact('contentBlock'));
    }

    /**
     * Update content block.
     * 
     * @param UpdateContentBlockRequest $request
     * @param ContentBlock $contentBlock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateContentBlockRequest $request, ContentBlock $contentBlock)
    {
        $this->contentBlocksRepository->update($contentBlock->id, $request->all());
        return redirect()->to('/admin/content_blocks');
    }

    /**
     * Delete a content block.
     * 
     * @param ContentBlock $contentBlock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ContentBlock $contentBlock)
    {
        $this->contentBlocksRepository->delete($contentBlock);
        return redirect()->to('/admin/content_blocks');
    }

}
