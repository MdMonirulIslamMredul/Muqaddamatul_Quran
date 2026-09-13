@extends('admin.master')
@section('title', ' - Video Gallery')
@section('body')
    <style>
        .video-source-card {
            background: #ffffff;
            border: 2px solid #e2e8f0 !important;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            user-select: none;
        }
        .video-source-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1 !important;
        }
        .video-source-card .radio-circle {
            border: 2px solid #cbd5e1 !important;
            background: #f8fafc;
            width: 22px;
            height: 22px;
            transition: all 0.2s ease;
        }
        .video-source-card .radio-circle i {
            display: none;
            font-size: 11px;
        }
        /* Active State for Raw Video Card */
        #cardRawFile.active {
            border-color: #0284c7 !important;
            background: linear-gradient(180deg, #f0f9ff 0%, #e0f2fe 100%) !important;
            box-shadow: 0 8px 22px rgba(2, 132, 199, 0.18) !important;
            transform: translateY(-2px);
        }
        #cardRawFile.active .radio-circle {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
        }
        #cardRawFile.active .radio-circle i {
            display: block !important;
        }

        /* Active State for YouTube Card */
        #cardEmbedLink.active {
            border-color: #ef4444 !important;
            background: linear-gradient(180deg, #fef2f2 0%, #fee2e2 100%) !important;
            box-shadow: 0 8px 22px rgba(239, 68, 68, 0.18) !important;
            transform: translateY(-2px);
        }
        #cardEmbedLink.active .radio-circle {
            background: #ef4444 !important;
            border-color: #ef4444 !important;
        }
        #cardEmbedLink.active .radio-circle i {
            display: block !important;
        }
    </style>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 text-white font-weight-bold">
                        <i class="fa fa-video mr-2"></i> Add Video to Gallery
                    </h4>
                    <span class="badge bg-light text-primary font-14">
                        Supports MP4, MKV, WMV & Embeds
                    </span>
                </div>

                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-check-circle mr-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                    
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-exclamation-triangle mr-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                    
                @endif

                @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card-body p-4">
                    <form id="videoUploadForm" class="form-horizontal" action="{{ route('store.video.gallery') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <!-- Video Title -->
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold">
                                Video Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title" id="videoTitleInput" class="form-control form-control-lg" placeholder="Enter an engaging video title (e.g. Annual Quran Recitation 2026)" value="{{ old('title') }}" required>
                        </div>

                        <!-- Video Source Type Selector -->
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-dark d-flex align-items-center mb-2" style="font-size: 15px;">
                                <i class="fa fa-layer-group text-primary mr-2"></i> Select Video Source Method <span class="text-danger ml-1">*</span>
                            </label>

                            <div class="row g-3">
                                <!-- Option 1: Raw Video Upload -->
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="video-source-card h-100 p-3 position-relative active" id="cardRawFile">
                                        <input type="radio" name="video_source_type" id="sourceRawFile" value="file" checked class="d-none">
                                        <div class="d-flex align-items-start">
                                            <div class="icon-box rounded-circle d-flex align-items-center justify-content-center mr-3 shadow-sm" style="width: 50px; height: 50px; min-width: 50px; background: linear-gradient(135deg, #0284c7, #0369a1); color: #fff;">
                                                <i class="fa fa-cloud-upload-alt fa-lg"></i>
                                            </div>
                                            <div class="flex-grow-1 pr-3">
                                                <div class="d-flex align-items-center flex-wrap mb-1">
                                                    <h6 class="mb-0 font-weight-bold text-dark" style="font-size: 15px;">Upload Raw Video File</h6>
                                                    <span class="badge bg-primary text-white ml-2" style="font-size: 10px;">MP4 / MKV / WMV</span>
                                                </div>
                                                <p class="text-muted small mb-0" style="line-height: 1.4;">
                                                    Direct file upload with real-time progress bar, speed & ETA. Supports up to 2GB.
                                                </p>
                                            </div>
                                            <div class="check-indicator position-absolute" style="top: 14px; right: 14px;">
                                                <div class="radio-circle rounded-circle border d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-check text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Option 2: YouTube / Embed Link -->
                                <div class="col-md-6">
                                    <div class="video-source-card h-100 p-3 position-relative" id="cardEmbedLink">
                                        <input type="radio" name="video_source_type" id="sourceEmbedLink" value="link" class="d-none">
                                        <div class="d-flex align-items-start">
                                            <div class="icon-box rounded-circle d-flex align-items-center justify-content-center mr-3 shadow-sm" style="width: 50px; height: 50px; min-width: 50px; background: linear-gradient(135deg, #ef4444, #dc2626); color: #fff;">
                                                <i class="fab fa-youtube fa-lg"></i>
                                            </div>
                                            <div class="flex-grow-1 pr-3">
                                                <div class="d-flex align-items-center flex-wrap mb-1">
                                                    <h6 class="mb-0 font-weight-bold text-dark" style="font-size: 15px;">YouTube / Embed Video</h6>
                                                    <span class="badge bg-danger text-white ml-2" style="font-size: 10px;">Auto-Fetch</span>
                                                </div>
                                                <p class="text-muted small mb-0" style="line-height: 1.4;">
                                                    Paste any YouTube or Shorts link. Generates iframe player & auto-downloads cover.
                                                </p>
                                            </div>
                                            <div class="check-indicator position-absolute" style="top: 14px; right: 14px;">
                                                <div class="radio-circle rounded-circle border d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-check text-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- RAW VIDEO FILE UPLOAD CONTAINER -->
                        <div id="rawVideoUploadContainer" class="p-3 mb-4 rounded border" style="background-color: #f8fafc;">
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">
                                    <i class="fa fa-file-video text-primary mr-1"></i> Select Video File
                                    <span class="badge bg-primary text-white ml-2">MP4</span>
                                    <span class="badge bg-info text-white">MKV</span>
                                    <span class="badge bg-secondary text-white">WMV</span>
                                    <span class="badge bg-dark text-white">WebM</span>
                                </label>
                                
                                <div class="custom-file-dropzone border border-primary border-dashed rounded p-4 text-center bg-white" id="dropZone">
                                    <i class="fa fa-cloud-upload-alt text-primary fa-3x mb-2"></i>
                                    <h5>Click to browse or drag & drop video here</h5>
                                    <p class="text-muted small mb-3">Supports MP4, MKV, WMV, WebM, AVI (Max: 2GB)</p>
                                    <input type="file" name="video_file" id="videoFileInput" class="d-none" accept=".mp4,.mkv,.wmv,.webm,.avi,.mov,video/*">
                                    <button type="button" class="btn btn-outline-primary px-4" onclick="document.getElementById('videoFileInput').click();">
                                        <i class="fa fa-folder-open mr-1"></i> Choose Video File
                                    </button>
                                </div>

                                <!-- Video File Details & Preview Box -->
                                <div id="videoFileDetails" class="mt-3 p-3 bg-white rounded border d-none">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <i class="fa fa-film fa-2x text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 font-weight-bold text-dark" id="videoFileName">filename.mp4</h6>
                                                <span class="badge bg-info text-white mr-2" id="videoFileFormat">MP4</span>
                                                <span class="text-muted small" id="videoFileSize">0 MB</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger" id="removeVideoBtn" title="Remove Video">
                                            <i class="fa fa-times"></i> Remove
                                        </button>
                                    </div>

                                    <!-- Video Preview Player for browser-supported formats -->
                                    <div id="videoPreviewWrapper" class="mt-3 d-none">
                                        <label class="form-label text-muted small font-weight-bold">Live Preview:</label>
                                        <video id="videoPreviewPlayer" controls playsinline class="rounded w-100" style="max-height: 260px; background: #000;"></video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EMBED / VIDEO LINK CONTAINER -->
                        <div id="embedVideoLinkContainer" class="p-3 mb-4 rounded border d-none" style="background-color: #f8fafc;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <label class="form-label font-weight-bold mb-0">
                                    <i class="fab fa-youtube text-danger mr-1"></i> YouTube Video Link or Embed Code
                                </label>
                                <span class="badge bg-danger text-white">
                                    <i class="fab fa-youtube mr-1"></i> Auto-Detects Title, Thumbnail & Iframe
                                </span>
                            </div>

                            <div class="input-group">
                                <textarea class="form-control" rows="2" name="video_link" id="videoLinkInput" placeholder="Paste YouTube link (e.g. https://www.youtube.com/watch?v=... or https://youtu.be/...) or embed code">{{ old('video_link') }}</textarea>
                                <button type="button" class="btn btn-outline-danger" id="fetchYouTubeBtn" title="Fetch Details from YouTube">
                                    <i class="fa fa-sync-alt mr-1"></i> Fetch Info
                                </button>
                            </div>
                            <small class="text-muted mt-1 d-block">
                                <i class="fa fa-magic text-warning mr-1"></i> Just paste any YouTube URL (watch, youtu.be, or shorts) — the system automatically generates the iframe preview, fetches the video title, and loads the video thumbnail!
                            </small>

                            <!-- YouTube Live Preview & Details Box -->
                            <div id="youtubeLivePreviewWrapper" class="mt-3 p-3 bg-white rounded border d-none">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-success text-white">
                                        <i class="fa fa-check mr-1"></i> YouTube Video Detected: <span id="detectedYtId"></span>
                                    </span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="applyYtTitleBtn" style="font-size: 12px;">
                                        <i class="fa fa-pencil-alt mr-1"></i> Re-apply YouTube Title
                                    </button>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm" style="height: 220px; background: #000;">
                                            <iframe id="youtubeLiveIframe" src="" style="width: 100%; height: 220px; border: 0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-2 mt-md-0">
                                        <h6 class="font-weight-bold text-dark mb-1" id="youtubeVideoTitleText">Loading title...</h6>
                                        <p class="small text-muted mb-2" id="youtubeChannelText"></p>
                                        <div class="alert alert-success py-1 px-2 small mb-0">
                                            <i class="fa fa-info-circle mr-1"></i> Title & thumbnail auto-synced!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- THUMBNAIL IMAGE -->
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">
                                        <i class="fa fa-image text-success mr-1"></i> Video Thumbnail
                                        <small class="text-muted">(JPG, PNG, WEBP - Recommended: 16:9 ratio e.g. 1280x720)</small>
                                    </label>
                                    <input type="file" name="thumbnail" id="thumbnailInput" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                                    <small class="text-muted mt-1 d-block">
                                        This image will be displayed as the video cover in the video gallery.
                                    </small>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="form-label font-weight-bold">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" selected>Active (Publish to Gallery)</option>
                                        <option value="0">Deactive (Draft / Hidden)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label font-weight-bold">Thumbnail Preview</label>
                                <div class="border rounded p-2 text-center bg-light" style="min-height: 140px; display: flex; align-items: center; justify-content: center;">
                                    <img id="thumbnailPreview" src="" alt="Thumbnail Preview" class="img-fluid rounded d-none" style="max-height: 140px; object-fit: cover;">
                                    <div id="thumbnailPlaceholder" class="text-muted">
                                        <i class="fa fa-image fa-2x mb-1 text-secondary"></i>
                                        <p class="small mb-0">No thumbnail selected</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REAL-TIME UPLOAD PROGRESS BAR -->
                        <div id="uploadProgressSection" class="card border-primary mb-4 d-none shadow-sm">
                            <div class="card-body p-3 bg-light">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="font-weight-bold text-primary" id="progressStatusText">
                                        <i class="fa fa-spinner fa-spin mr-1"></i> Uploading video file...
                                    </span>
                                    <span class="badge bg-primary text-white font-14 font-weight-bold" id="progressPercentBadge">0%</span>
                                </div>

                                <!-- Bootstrap Progress Bar with Striped Animation -->
                                <div class="progress" style="height: 22px; border-radius: 12px; background-color: #e2e8f0;">
                                    <div id="progressBarFill" class="progress-bar progress-bar-striped progress-bar-animated bg-gradient bg-primary" role="progressbar" style="width: 0%; font-weight: bold; font-size: 12px; transition: width 0.2s ease;">
                                        0%
                                    </div>
                                </div>

                                <!-- Upload Stats (Uploaded/Total, Speed, ETA) -->
                                <div class="d-flex justify-content-between align-items-center mt-2 small text-muted">
                                    <div id="progressBytesStats">
                                        <i class="fa fa-database mr-1"></i> <span id="uploadedBytes">0 MB</span> / <span id="totalBytes">0 MB</span>
                                    </div>
                                    <div id="progressSpeedStats">
                                        <i class="fa fa-tachometer-alt mr-1"></i> <span id="uploadSpeed">0 KB/s</span>
                                    </div>
                                    <div id="progressEtaStats">
                                        <i class="fa fa-clock mr-1"></i> ETA: <span id="uploadEta">Calculating...</span>
                                    </div>
                                </div>

                                <!-- Server Processing Note -->
                                <div id="serverProcessingNotice" class="alert alert-info mt-3 py-2 px-3 mb-0 small d-none">
                                    <i class="fa fa-cog fa-spin mr-1"></i> File upload 100% complete! Processing and saving to gallery on the server... Please do not close this window.
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Alert Box for AJAX errors -->
                        <div id="uploadErrorAlert" class="alert alert-danger d-none mb-3" role="alert">
                            <i class="fa fa-exclamation-triangle mr-2"></i> <span id="uploadErrorMessage"></span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center pt-2 border-top">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-lg px-5 font-weight-bold">
                                <i class="fa fa-upload mr-1"></i> Upload & Save Video
                            </button>
                            <button type="reset" id="resetBtn" class="btn btn-outline-secondary btn-lg ml-3 px-4">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Gallery List Section -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <i class="fa fa-photo-video text-primary mr-2"></i> Existing Video Gallery ({{ $videos->count() }})
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="config-table" class="table table-hover table-striped align-middle border">
                            <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th style="width: 140px;">Preview</th>
                                <th>Title & Source</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th style="width: 130px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($videos as $index => $video)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="position-relative rounded overflow-hidden" style="width: 120px; height: 75px; background: #0f172a;">
                                            @if($video->thumbnail && file_exists(public_path($video->thumbnail)))
                                                <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                    <span class="badge rounded-pill bg-dark bg-opacity-75 text-white px-2 py-1">
                                                        <i class="fa fa-play text-danger"></i>
                                                    </span>
                                                </div>
                                            @elseif($video->video_file)
                                                <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white">
                                                    <i class="fa fa-play-circle fa-2x text-primary mb-1"></i>
                                                    <span class="small font-weight-bold">{{ strtoupper(pathinfo($video->video_file, PATHINFO_EXTENSION)) }}</span>
                                                </div>
                                            @else
                                                <div class="d-flex flex-column align-items-center justify-content-center h-100 text-white">
                                                    <i class="fab fa-youtube fa-2x text-danger mb-1"></i>
                                                    <span class="small">Embed</span>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-1 font-weight-bold text-dark">
                                            {{ $video->title ?? 'Untitled Video' }}
                                        </h6>
                                        @if($video->video_file)
                                            <small class="text-muted d-block">
                                                <i class="fa fa-file-video mr-1"></i> {{ basename($video->video_file) }}
                                            </small>
                                            <a href="{{ asset($video->video_file) }}" target="_blank" class="badge bg-light text-primary border text-decoration-none mt-1">
                                                <i class="fa fa-external-link-alt mr-1"></i> Open Raw File
                                            </a>
                                        @elseif($video->video_link)
                                            <div class="text-muted small text-truncate" style="max-width: 350px;">
                                                <code>{{ Str::limit(strip_tags($video->video_link), 60) }}</code>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($video->video_file)
                                            <span class="badge bg-primary text-white">
                                                <i class="fa fa-video mr-1"></i> Raw Video ({{ strtoupper(pathinfo($video->video_file, PATHINFO_EXTENSION)) }})
                                            </span>
                                        @else
                                            <span class="badge bg-secondary text-white">
                                                <i class="fa fa-link mr-1"></i> Embed Link
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($video->status == 1)
                                            <span class="badge bg-success text-white">Active</span>
                                        @else
                                            <span class="badge bg-danger text-white">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('edit.video.gallery', ['id' => $video->id]) }}" class="btn btn-sm btn-info text-white" title="Edit Video">
                                                <i class="fa fa-pencil-alt"></i> Edit
                                            </a>
                                            <a href="{{ route('delete.video.gallery', ['id' => $video->id]) }}" class="btn btn-sm btn-danger ml-1" title="Delete Video" onclick="return confirm('Are you sure you want to permanently delete this video? This cannot be undone.');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fa fa-video-slash fa-2x mb-2 text-secondary d-block"></i>
                                        No videos in gallery yet. Upload your first video above!
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // UI Elements
    const form = document.getElementById('videoUploadForm');
    const submitBtn = document.getElementById('submitBtn');
    const resetBtn = document.getElementById('resetBtn');
    const sourceRawFile = document.getElementById('sourceRawFile');
    const sourceEmbedLink = document.getElementById('sourceEmbedLink');
    const cardRawFile = document.getElementById('cardRawFile');
    const cardEmbedLink = document.getElementById('cardEmbedLink');
    const rawContainer = document.getElementById('rawVideoUploadContainer');
    const embedContainer = document.getElementById('embedVideoLinkContainer');
    const videoFileInput = document.getElementById('videoFileInput');
    const videoFileDetails = document.getElementById('videoFileDetails');
    const videoFileName = document.getElementById('videoFileName');
    const videoFileSize = document.getElementById('videoFileSize');
    const videoFileFormat = document.getElementById('videoFileFormat');
    const removeVideoBtn = document.getElementById('removeVideoBtn');
    const videoPreviewWrapper = document.getElementById('videoPreviewWrapper');
    const videoPreviewPlayer = document.getElementById('videoPreviewPlayer');
    const dropZone = document.getElementById('dropZone');
    const thumbnailInput = document.getElementById('thumbnailInput');
    const thumbnailPreview = document.getElementById('thumbnailPreview');
    const thumbnailPlaceholder = document.getElementById('thumbnailPlaceholder');
    
    // Progress Bar Elements
    const progressSection = document.getElementById('uploadProgressSection');
    const progressBarFill = document.getElementById('progressBarFill');
    const progressPercentBadge = document.getElementById('progressPercentBadge');
    const progressStatusText = document.getElementById('progressStatusText');
    const uploadedBytesSpan = document.getElementById('uploadedBytes');
    const totalBytesSpan = document.getElementById('totalBytes');
    const uploadSpeedSpan = document.getElementById('uploadSpeed');
    const uploadEtaSpan = document.getElementById('uploadEta');
    const serverProcessingNotice = document.getElementById('serverProcessingNotice');
    const uploadErrorAlert = document.getElementById('uploadErrorAlert');
    const uploadErrorMessage = document.getElementById('uploadErrorMessage');

    // Helper: format bytes to human readable
    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    // Toggle Source Type
    function toggleSourceType() {
        if (sourceRawFile.checked) {
            cardRawFile.classList.add('active');
            cardEmbedLink.classList.remove('active');
            rawContainer.classList.remove('d-none');
            embedContainer.classList.add('d-none');
        } else {
            cardRawFile.classList.remove('active');
            cardEmbedLink.classList.add('active');
            rawContainer.classList.add('d-none');
            embedContainer.classList.remove('d-none');
        }
    }
    sourceRawFile.addEventListener('change', toggleSourceType);
    sourceEmbedLink.addEventListener('change', toggleSourceType);

    cardRawFile.addEventListener('click', function() {
        sourceRawFile.checked = true;
        toggleSourceType();
    });
    cardEmbedLink.addEventListener('click', function() {
        sourceEmbedLink.checked = true;
        toggleSourceType();
    });

    // Drag and Drop handling
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add('border-success', 'bg-light');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('border-success', 'bg-light');
        }, false);
    });

    dropZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length > 0) {
            videoFileInput.files = files;
            handleVideoSelect(files[0]);
        }
    });

    // File input change
    videoFileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            handleVideoSelect(this.files[0]);
        }
    });

    function handleVideoSelect(file) {
        const ext = file.name.split('.').pop().toLowerCase();
        const allowedExts = ['mp4', 'mkv', 'wmv', 'webm', 'avi', 'mov'];
        
        if (!allowedExts.includes(ext)) {
            showError('Invalid file format. Please select an MP4, MKV, WMV, WebM, or AVI file.');
            videoFileInput.value = '';
            return;
        }

        hideError();
        videoFileName.textContent = file.name;
        videoFileSize.textContent = formatBytes(file.size);
        videoFileFormat.textContent = ext.toUpperCase();
        videoFileDetails.classList.remove('d-none');

        // Auto-fill title if empty
        const titleInput = document.getElementById('videoTitleInput');
        if (!titleInput.value.trim()) {
            const cleanTitle = file.name.replace(/\.[^/.]+$/, "").replace(/[-_]/g, ' ');
            titleInput.value = cleanTitle.charAt(0).toUpperCase() + cleanTitle.slice(1);
        }

        // Preview player for formats supported natively by browser
        if (['mp4', 'webm'].includes(ext)) {
            const blobUrl = URL.createObjectURL(file);
            videoPreviewPlayer.src = blobUrl;
            videoPreviewWrapper.classList.remove('d-none');
        } else {
            videoPreviewPlayer.pause();
            videoPreviewPlayer.removeAttribute('src');
            videoPreviewWrapper.classList.add('d-none');
        }
    }

    // Remove video file
    removeVideoBtn.addEventListener('click', function() {
        videoFileInput.value = '';
        videoFileDetails.classList.add('d-none');
        videoPreviewWrapper.classList.add('d-none');
        videoPreviewPlayer.pause();
        videoPreviewPlayer.removeAttribute('src');
    });

    // Thumbnail Preview
    thumbnailInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                thumbnailPreview.src = e.target.result;
                thumbnailPreview.classList.remove('d-none');
                thumbnailPlaceholder.classList.add('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            thumbnailPreview.src = '';
            thumbnailPreview.classList.add('d-none');
            thumbnailPlaceholder.classList.remove('d-none');
        }
    });

    // YouTube Auto-Detection, Live Iframe & Title/Thumbnail Sync
    const videoLinkInput = document.getElementById('videoLinkInput');
    const fetchYouTubeBtn = document.getElementById('fetchYouTubeBtn');
    const ytLivePreviewWrapper = document.getElementById('youtubeLivePreviewWrapper');
    const ytLiveIframe = document.getElementById('youtubeLiveIframe');
    const detectedYtIdSpan = document.getElementById('detectedYtId');
    const ytVideoTitleText = document.getElementById('youtubeVideoTitleText');
    const ytChannelText = document.getElementById('youtubeChannelText');
    const applyYtTitleBtn = document.getElementById('applyYtTitleBtn');
    let lastFetchedYtTitle = '';

    function extractYouTubeId(url) {
        if (!url) return null;
        const regExp = /(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/|watch\?.+&v=))([\w-]{11})/;
        const match = url.match(regExp);
        return match ? match[1] : null;
    }

    function processYouTubeInput() {
        const val = videoLinkInput.value.trim();
        const ytId = extractYouTubeId(val);

        if (ytId) {
            detectedYtIdSpan.textContent = ytId;
            ytLiveIframe.src = 'https://www.youtube.com/embed/' + ytId + '?rel=0';
            ytLivePreviewWrapper.classList.remove('d-none');

            // Auto-set thumbnail preview from YouTube if no custom image uploaded yet
            if (!thumbnailInput.files || thumbnailInput.files.length === 0) {
                thumbnailPreview.src = 'https://img.youtube.com/vi/' + ytId + '/hqdefault.jpg';
                thumbnailPreview.classList.remove('d-none');
                thumbnailPlaceholder.classList.add('d-none');
            }

            // Fetch YouTube Title & Info via public oEmbed
            ytVideoTitleText.textContent = 'Fetching title from YouTube...';
            ytChannelText.textContent = '';
            
            fetch('https://noembed.com/embed?url=https://www.youtube.com/watch?v=' + ytId)
                .then(res => res.json())
                .then(data => {
                    if (data && data.title) {
                        lastFetchedYtTitle = data.title;
                        ytVideoTitleText.textContent = data.title;
                        ytChannelText.textContent = data.author_name ? 'Channel: ' + data.author_name : '';

                        const titleInput = document.getElementById('videoTitleInput');
                        // Auto-fill title if currently empty or default
                        if (!titleInput.value.trim() || titleInput.value.includes('YouTube') || titleInput.value.includes('Untitled')) {
                            titleInput.value = data.title;
                        }
                    } else {
                        ytVideoTitleText.textContent = 'YouTube Video (' + ytId + ')';
                    }
                })
                .catch(() => {
                    ytVideoTitleText.textContent = 'YouTube Video (' + ytId + ')';
                });
        } else {
            ytLivePreviewWrapper.classList.add('d-none');
            ytLiveIframe.src = '';
        }
    }

    videoLinkInput.addEventListener('input', processYouTubeInput);
    videoLinkInput.addEventListener('paste', () => setTimeout(processYouTubeInput, 50));
    fetchYouTubeBtn.addEventListener('click', processYouTubeInput);
    applyYtTitleBtn.addEventListener('click', function() {
        if (lastFetchedYtTitle) {
            document.getElementById('videoTitleInput').value = lastFetchedYtTitle;
        }
    });

    // Run on page load if old value exists
    if (videoLinkInput.value.trim()) {
        processYouTubeInput();
    }

    // Error helper
    function showError(msg) {
        uploadErrorMessage.textContent = msg;
        uploadErrorAlert.classList.remove('d-none');
    }
    function hideError() {
        uploadErrorAlert.classList.add('d-none');
    }

    // Reset Form
    resetBtn.addEventListener('click', function() {
        setTimeout(() => {
            toggleSourceType();
            removeVideoBtn.click();
            thumbnailPreview.src = '';
            thumbnailPreview.classList.add('d-none');
            thumbnailPlaceholder.classList.remove('d-none');
            progressSection.classList.add('d-none');
            hideError();
        }, 50);
    });

    // Form Submission with Real-Time Progress Bar
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        hideError();

        // Check if raw video or embed
        const isRaw = sourceRawFile.checked;
        const hasFile = videoFileInput.files && videoFileInput.files.length > 0;
        const embedVal = document.getElementById('videoLinkInput').value.trim();

        if (isRaw && !hasFile) {
            showError('Please select a video file (MP4, MKV, WMV) to upload.');
            return;
        }

        if (!isRaw && !embedVal) {
            showError('Please enter an embed video link or iframe code.');
            return;
        }

        // Prepare FormData
        const formData = new FormData(form);

        // Show Progress Section
        progressSection.classList.remove('d-none');
        progressBarFill.style.width = '0%';
        progressBarFill.textContent = '0%';
        progressPercentBadge.textContent = '0%';
        progressStatusText.innerHTML = '<i class="fa fa-spinner fa-spin mr-1"></i> Starting video upload...';
        serverProcessingNotice.classList.add('d-none');
        
        // Disable buttons
        submitBtn.disabled = true;
        resetBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Uploading...';

        // XHR for byte-level upload tracking
        const xhr = new XMLHttpRequest();
        let startTime = Date.now();
        let prevLoaded = 0;
        let prevTime = startTime;

        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                progressBarFill.style.width = percent + '%';
                progressBarFill.textContent = percent + '%';
                progressPercentBadge.textContent = percent + '%';

                uploadedBytesSpan.textContent = formatBytes(e.loaded);
                totalBytesSpan.textContent = formatBytes(e.total);

                // Speed and ETA calculation
                const now = Date.now();
                const timeDiff = (now - prevTime) / 1000;
                if (timeDiff >= 0.5 || percent === 100) {
                    const bytesDiff = e.loaded - prevLoaded;
                    const speed = bytesDiff / timeDiff; // bytes per second
                    uploadSpeedSpan.textContent = formatBytes(speed) + '/s';

                    if (speed > 0 && percent < 100) {
                        const remainingBytes = e.total - e.loaded;
                        const remainingSeconds = Math.round(remainingBytes / speed);
                        if (remainingSeconds < 60) {
                            uploadEtaSpan.textContent = remainingSeconds + 's remaining';
                        } else {
                            const minutes = Math.floor(remainingSeconds / 60);
                            const seconds = remainingSeconds % 60;
                            uploadEtaSpan.textContent = minutes + 'm ' + seconds + 's remaining';
                        }
                    } else if (percent === 100) {
                        uploadEtaSpan.textContent = 'Completed';
                    }

                    prevLoaded = e.loaded;
                    prevTime = now;
                }

                if (percent < 100) {
                    progressStatusText.innerHTML = '<i class="fa fa-arrow-up mr-1"></i> Uploading file (' + percent + '%)...';
                } else {
                    progressStatusText.innerHTML = '<i class="fa fa-cog fa-spin mr-1"></i> Finalizing video on server...';
                    serverProcessingNotice.classList.remove('d-none');
                    progressBarFill.classList.add('bg-success');
                }
            }
        });

        xhr.addEventListener('load', function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    progressStatusText.innerHTML = '<i class="fa fa-check-circle text-success mr-1"></i> ' + (response.message || 'Video uploaded successfully!');
                    progressBarFill.style.width = '100%';
                    progressBarFill.textContent = '100%';
                    progressBarFill.classList.remove('progress-bar-animated');
                    progressBarFill.classList.add('bg-success');

                    // Short timeout before redirect so user sees 100% success
                    setTimeout(function() {
                        window.location.href = response.redirect_url || '{{ route("add.video.gallery") }}';
                    }, 800);
                } catch (e) {
                    // Normal redirect fallback
                    window.location.reload();
                }
            } else {
                submitBtn.disabled = false;
                resetBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-upload mr-1"></i> Upload & Save Video';
                progressBarFill.classList.remove('bg-primary', 'progress-bar-animated');
                progressBarFill.classList.add('bg-danger');

                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res.errors) {
                        const errorList = Object.values(res.errors).flat().join('<br>');
                        showError(errorList);
                    } else {
                        showError(res.message || 'Upload failed with status ' + xhr.status);
                    }
                } catch (e) {
                    showError('Upload failed: Server error or file size exceeds server limit (HTTP ' + xhr.status + ').');
                }
            }
        });

        xhr.addEventListener('error', function() {
            submitBtn.disabled = false;
            resetBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa fa-upload mr-1"></i> Upload & Save Video';
            progressBarFill.classList.remove('bg-primary', 'progress-bar-animated');
            progressBarFill.classList.add('bg-danger');
            showError('Network error occurred during video upload. Please verify your connection and try again.');
        });

        xhr.addEventListener('abort', function() {
            submitBtn.disabled = false;
            resetBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa fa-upload mr-1"></i> Upload & Save Video';
            showError('Upload was aborted.');
        });

        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send(formData);
    });
});
</script>
@endpush
