@extends('admin.master')
@section('title', ' - Edit Video')
@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 text-white font-weight-bold">
                        <i class="fa fa-edit mr-2"></i> Edit Video Gallery Item #{{ $edit_video->id }}
                    </h4>
                    <a href="{{ route('add.video.gallery') }}" class="btn btn-light btn-sm font-weight-bold text-primary">
                        <i class="fa fa-arrow-left mr-1"></i> Back to Video Gallery
                    </a>
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
                    <!-- Current Video Preview Card -->
                    <div class="mb-4 p-3 rounded border bg-light">
                        <h6 class="font-weight-bold text-dark mb-3">
                            <i class="fa fa-play-circle text-primary mr-1"></i> Current Video Preview
                        </h6>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3 mb-md-0">
                                @if($edit_video->video_file && file_exists(public_path($edit_video->video_file)))
                                    <div class="rounded overflow-hidden shadow-sm" style="background: #000; max-height: 260px;">
                                        <video controls playsinline preload="metadata" poster="{{ $edit_video->thumbnail ? asset($edit_video->thumbnail) : '' }}" class="w-100" style="max-height: 260px; object-fit: contain;">
                                            <source src="{{ asset($edit_video->video_file) }}">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                    <div class="mt-2 d-flex align-items-center justify-content-between">
                                        <span class="badge bg-primary text-white">
                                            Raw Video: {{ strtoupper(pathinfo($edit_video->video_file, PATHINFO_EXTENSION)) }}
                                        </span>
                                        <a href="{{ asset($edit_video->video_file) }}" target="_blank" class="small text-primary">
                                            <i class="fa fa-external-link-alt"></i> Open File Directly
                                        </a>
                                    </div>
                                @elseif($edit_video->video_link)
                                    <div class="video-preview-embed rounded overflow-hidden shadow-sm" style="max-height: 260px;">
                                        {!! $edit_video->video_link !!}
                                    </div>
                                    <span class="badge bg-secondary text-white mt-2">Embed Link / YouTube</span>
                                @else
                                    <div class="p-4 text-center text-muted border rounded bg-white">
                                        <i class="fa fa-video-slash fa-2x mb-2 text-secondary"></i>
                                        <p class="mb-0">No video attached to this record.</p>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-dark mb-1">Current Thumbnail</h6>
                                @if($edit_video->thumbnail && file_exists(public_path($edit_video->thumbnail)))
                                    <div class="rounded overflow-hidden border mb-2" style="max-width: 260px; height: 150px;">
                                        <img src="{{ asset($edit_video->thumbnail) }}" alt="Current Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <small class="text-muted d-block">
                                        <i class="fa fa-image mr-1"></i> {{ basename($edit_video->thumbnail) }}
                                    </small>
                                @else
                                    <div class="border rounded p-3 text-center text-muted bg-white" style="max-width: 260px;">
                                        <i class="fa fa-image fa-2x text-secondary mb-1"></i>
                                        <p class="small mb-0">No thumbnail uploaded</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Edit Form -->
                    <form id="editVideoForm" class="form-horizontal" action="{{ route('update.video.gallery') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $edit_video->id }}" name="id">

                        <!-- Title -->
                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold">
                                Video Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Video Title" value="{{ old('title', $edit_video->title) }}" required>
                        </div>

                        <!-- Replace Raw Video File -->
                        <div class="p-3 mb-4 rounded border" style="background-color: #f8fafc;">
                            <label class="form-label font-weight-bold">
                                <i class="fa fa-file-video text-primary mr-1"></i> Replace Video File
                                <span class="text-muted font-weight-normal">(Optional - leave blank to keep current video)</span>
                            </label>
                            <input type="file" name="video_file" id="editVideoFileInput" class="form-control" accept=".mp4,.mkv,.wmv,.webm,.avi,.mov,video/*">
                            <small class="text-muted mt-1 d-block">
                                Supported formats: MP4, MKV, WMV, WebM, AVI. Max size: 2GB.
                            </small>

                            <!-- Selected Replacement File Info -->
                            <div id="replacementFileInfo" class="mt-2 p-2 bg-white rounded border d-none">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="small">
                                        <i class="fa fa-film text-primary mr-1"></i>
                                        <strong id="repFileName">file.mp4</strong>
                                        (<span id="repFileSize">0 MB</span>, <span id="repFileFormat">MP4</span>)
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2" id="clearReplacementVideoBtn">
                                        Cancel replacement
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Embed / Video Link -->
                        <div class="p-3 mb-4 rounded border" style="background-color: #f8fafc;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <label class="form-label font-weight-bold mb-0">
                                    <i class="fab fa-youtube text-danger mr-1"></i> YouTube Video Link or Embed Code
                                </label>
                                <span class="badge bg-danger text-white">
                                    <i class="fab fa-youtube mr-1"></i> Auto-Detects Title, Thumbnail & Iframe
                                </span>
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" rows="2" name="video_link" id="editVideoLinkInput" placeholder="Paste YouTube link (e.g. https://www.youtube.com/watch?v=... or https://youtu.be/...) or embed code">{{ old('video_link', $edit_video->video_link) }}</textarea>
                                <button type="button" class="btn btn-outline-danger" id="editFetchYouTubeBtn" title="Fetch Details from YouTube">
                                    <i class="fa fa-sync-alt mr-1"></i> Fetch Info
                                </button>
                            </div>
                            <small class="text-muted mt-1 d-block">
                                <i class="fa fa-magic text-warning mr-1"></i> Paste a YouTube URL — the system will generate the responsive iframe, fetch the title, and download the thumbnail.
                            </small>

                            <!-- YouTube Live Preview Box -->
                            <div id="editYoutubeLivePreviewWrapper" class="mt-3 p-3 bg-white rounded border d-none">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="badge bg-success text-white">
                                        <i class="fa fa-check mr-1"></i> YouTube Video Detected: <span id="editDetectedYtId"></span>
                                    </span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="editApplyYtTitleBtn" style="font-size: 12px;">
                                        <i class="fa fa-pencil-alt mr-1"></i> Use YouTube Title
                                    </button>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm" style="height: 200px; background: #000;">
                                            <iframe id="editYoutubeLiveIframe" src="" style="width: 100%; height: 200px; border: 0;" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-2 mt-md-0">
                                        <h6 class="font-weight-bold text-dark mb-1" id="editYtTitleText"></h6>
                                        <p class="small text-muted mb-0" id="editYtChannelText"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnail & Status Row -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">
                                        <i class="fa fa-image text-success mr-1"></i> Replace Thumbnail Image
                                        <span class="text-muted font-weight-normal">(Optional)</span>
                                    </label>
                                    <input type="file" name="thumbnail" id="editThumbnailInput" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                                    <small class="text-muted mt-1 d-block">
                                        JPG, PNG, WEBP. Recommended: 1280x720 (16:9 ratio).
                                    </small>
                                </div>
                                <div id="editThumbnailPreviewContainer" class="mt-2 d-none">
                                    <label class="small text-muted font-weight-bold">New Thumbnail Preview:</label>
                                    <div class="border rounded p-1 bg-white" style="max-width: 200px; height: 110px;">
                                        <img id="editThumbnailPreview" src="" alt="New Thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" @if ($edit_video->status == 1) selected @endif>Active (Published)</option>
                                        <option value="0" @if ($edit_video->status == 0) selected @endif>Deactive (Hidden)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- REAL-TIME UPLOAD PROGRESS BAR -->
                        <div id="editUploadProgressSection" class="card border-primary mb-4 d-none shadow-sm">
                            <div class="card-body p-3 bg-light">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="font-weight-bold text-primary" id="editProgressStatusText">
                                        <i class="fa fa-spinner fa-spin mr-1"></i> Uploading updated video...
                                    </span>
                                    <span class="badge bg-primary text-white font-14 font-weight-bold" id="editProgressPercentBadge">0%</span>
                                </div>

                                <div class="progress" style="height: 22px; border-radius: 12px; background-color: #e2e8f0;">
                                    <div id="editProgressBarFill" class="progress-bar progress-bar-striped progress-bar-animated bg-gradient bg-primary" role="progressbar" style="width: 0%; font-weight: bold; font-size: 12px; transition: width 0.2s ease;">
                                        0%
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2 small text-muted">
                                    <div>
                                        <i class="fa fa-database mr-1"></i> <span id="editUploadedBytes">0 MB</span> / <span id="editTotalBytes">0 MB</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-tachometer-alt mr-1"></i> <span id="editUploadSpeed">0 KB/s</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-clock mr-1"></i> ETA: <span id="editUploadEta">Calculating...</span>
                                    </div>
                                </div>

                                <div id="editServerProcessingNotice" class="alert alert-info mt-3 py-2 px-3 mb-0 small d-none">
                                    <i class="fa fa-cog fa-spin mr-1"></i> File uploaded 100%! Processing update on server...
                                </div>
                            </div>
                        </div>

                        <!-- Error Alert -->
                        <div id="editUploadErrorAlert" class="alert alert-danger d-none mb-3" role="alert">
                            <i class="fa fa-exclamation-triangle mr-2"></i> <span id="editUploadErrorMessage"></span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center pt-3 border-top">
                            <button type="submit" id="editSubmitBtn" class="btn btn-info btn-lg px-5 font-weight-bold text-white">
                                <i class="fa fa-save mr-1"></i> Update Video
                            </button>
                            <a href="{{ route('add.video.gallery') }}" class="btn btn-outline-secondary btn-lg ml-3 px-4">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('editVideoForm');
    const submitBtn = document.getElementById('editSubmitBtn');
    const videoFileInput = document.getElementById('editVideoFileInput');
    const repFileInfo = document.getElementById('replacementFileInfo');
    const repFileName = document.getElementById('repFileName');
    const repFileSize = document.getElementById('repFileSize');
    const repFileFormat = document.getElementById('repFileFormat');
    const clearRepBtn = document.getElementById('clearReplacementVideoBtn');
    const thumbnailInput = document.getElementById('editThumbnailInput');
    const thumbPreviewContainer = document.getElementById('editThumbnailPreviewContainer');
    const thumbPreview = document.getElementById('editThumbnailPreview');
    
    // Progress Bar Elements
    const progressSection = document.getElementById('editUploadProgressSection');
    const progressBarFill = document.getElementById('editProgressBarFill');
    const progressPercentBadge = document.getElementById('editProgressPercentBadge');
    const progressStatusText = document.getElementById('editProgressStatusText');
    const uploadedBytesSpan = document.getElementById('editUploadedBytes');
    const totalBytesSpan = document.getElementById('editTotalBytes');
    const uploadSpeedSpan = document.getElementById('editUploadSpeed');
    const uploadEtaSpan = document.getElementById('editUploadEta');
    const serverProcessingNotice = document.getElementById('editServerProcessingNotice');
    const uploadErrorAlert = document.getElementById('editUploadErrorAlert');
    const uploadErrorMessage = document.getElementById('editUploadErrorMessage');

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    function showError(msg) {
        uploadErrorMessage.textContent = msg;
        uploadErrorAlert.classList.remove('d-none');
    }
    function hideError() {
        uploadErrorAlert.classList.add('d-none');
    }

    videoFileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const ext = file.name.split('.').pop().toLowerCase();
            const allowed = ['mp4', 'mkv', 'wmv', 'webm', 'avi', 'mov'];
            if (!allowed.includes(ext)) {
                showError('Invalid file format. Allowed formats: MP4, MKV, WMV, WebM, AVI.');
                this.value = '';
                repFileInfo.classList.add('d-none');
                return;
            }
            hideError();
            repFileName.textContent = file.name;
            repFileSize.textContent = formatBytes(file.size);
            repFileFormat.textContent = ext.toUpperCase();
            repFileInfo.classList.remove('d-none');
        } else {
            repFileInfo.classList.add('d-none');
        }
    });

    clearRepBtn.addEventListener('click', function() {
        videoFileInput.value = '';
        repFileInfo.classList.add('d-none');
    });

    thumbnailInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                thumbPreview.src = e.target.result;
                thumbPreviewContainer.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            thumbPreview.src = '';
            thumbPreviewContainer.classList.add('d-none');
        }
    });

    // YouTube Auto-Detection, Live Iframe & Title/Thumbnail Sync
    const editVideoLinkInput = document.getElementById('editVideoLinkInput');
    const editFetchYouTubeBtn = document.getElementById('editFetchYouTubeBtn');
    const editYtLivePreviewWrapper = document.getElementById('editYoutubeLivePreviewWrapper');
    const editYtLiveIframe = document.getElementById('editYoutubeLiveIframe');
    const editDetectedYtIdSpan = document.getElementById('editDetectedYtId');
    const editYtTitleText = document.getElementById('editYtTitleText');
    const editYtChannelText = document.getElementById('editYtChannelText');
    const editApplyYtTitleBtn = document.getElementById('editApplyYtTitleBtn');
    let lastFetchedEditYtTitle = '';

    function extractYouTubeId(url) {
        if (!url) return null;
        const regExp = /(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/|watch\?.+&v=))([\w-]{11})/;
        const match = url.match(regExp);
        return match ? match[1] : null;
    }

    function processEditYouTubeInput() {
        const val = editVideoLinkInput.value.trim();
        const ytId = extractYouTubeId(val);

        if (ytId) {
            editDetectedYtIdSpan.textContent = ytId;
            editYtLiveIframe.src = 'https://www.youtube.com/embed/' + ytId + '?rel=0';
            editYtLivePreviewWrapper.classList.remove('d-none');

            // Set thumbnail preview if no replacement thumbnail file selected
            if (!thumbnailInput.files || thumbnailInput.files.length === 0) {
                thumbPreview.src = 'https://img.youtube.com/vi/' + ytId + '/hqdefault.jpg';
                thumbPreviewContainer.classList.remove('d-none');
            }

            editYtTitleText.textContent = 'Fetching title from YouTube...';
            editYtChannelText.textContent = '';

            fetch('https://noembed.com/embed?url=https://www.youtube.com/watch?v=' + ytId)
                .then(res => res.json())
                .then(data => {
                    if (data && data.title) {
                        lastFetchedEditYtTitle = data.title;
                        editYtTitleText.textContent = data.title;
                        editYtChannelText.textContent = data.author_name ? 'Channel: ' + data.author_name : '';

                        const titleInput = form.querySelector('input[name="title"]');
                        if (!titleInput.value.trim()) {
                            titleInput.value = data.title;
                        }
                    } else {
                        editYtTitleText.textContent = 'YouTube Video (' + ytId + ')';
                    }
                })
                .catch(() => {
                    editYtTitleText.textContent = 'YouTube Video (' + ytId + ')';
                });
        } else {
            editYtLivePreviewWrapper.classList.add('d-none');
            editYtLiveIframe.src = '';
        }
    }

    editVideoLinkInput.addEventListener('input', processEditYouTubeInput);
    editVideoLinkInput.addEventListener('paste', () => setTimeout(processEditYouTubeInput, 50));
    editFetchYouTubeBtn.addEventListener('click', processEditYouTubeInput);
    editApplyYtTitleBtn.addEventListener('click', function() {
        if (lastFetchedEditYtTitle) {
            form.querySelector('input[name="title"]').value = lastFetchedEditYtTitle;
        }
    });

    if (editVideoLinkInput.value.trim()) {
        processEditYouTubeInput();
    }

    form.addEventListener('submit', function(e) {
        const hasNewVideo = videoFileInput.files && videoFileInput.files.length > 0;
        const hasNewThumb = thumbnailInput.files && thumbnailInput.files.length > 0;

        // If no large video file is being uploaded, submit normally or via XHR
        if (!hasNewVideo && !hasNewThumb) {
            return; // Normal form submit
        }

        // Use AJAX progress bar when files are uploaded
        e.preventDefault();
        hideError();

        const formData = new FormData(form);
        progressSection.classList.remove('d-none');
        progressBarFill.style.width = '0%';
        progressBarFill.textContent = '0%';
        progressPercentBadge.textContent = '0%';
        progressStatusText.innerHTML = '<i class="fa fa-spinner fa-spin mr-1"></i> Uploading updated files...';
        serverProcessingNotice.classList.add('d-none');

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Updating...';

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

                const now = Date.now();
                const timeDiff = (now - prevTime) / 1000;
                if (timeDiff >= 0.5 || percent === 100) {
                    const bytesDiff = e.loaded - prevLoaded;
                    const speed = bytesDiff / timeDiff;
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
                    progressStatusText.innerHTML = '<i class="fa fa-arrow-up mr-1"></i> Uploading (' + percent + '%)...';
                } else {
                    progressStatusText.innerHTML = '<i class="fa fa-cog fa-spin mr-1"></i> Finalizing update on server...';
                    serverProcessingNotice.classList.remove('d-none');
                    progressBarFill.classList.add('bg-success');
                }
            }
        });

        xhr.addEventListener('load', function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    progressStatusText.innerHTML = '<i class="fa fa-check-circle text-success mr-1"></i> ' + (response.message || 'Updated successfully!');
                    progressBarFill.style.width = '100%';
                    progressBarFill.textContent = '100%';
                    progressBarFill.classList.remove('progress-bar-animated');
                    progressBarFill.classList.add('bg-success');

                    setTimeout(function() {
                        window.location.href = response.redirect_url || '{{ route("add.video.gallery") }}';
                    }, 800);
                } catch (e) {
                    window.location.href = '{{ route("add.video.gallery") }}';
                }
            } else {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-save mr-1"></i> Update Video';
                progressBarFill.classList.remove('bg-primary', 'progress-bar-animated');
                progressBarFill.classList.add('bg-danger');

                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res.errors) {
                        const errorList = Object.values(res.errors).flat().join('<br>');
                        showError(errorList);
                    } else {
                        showError(res.message || 'Update failed with status ' + xhr.status);
                    }
                } catch (e) {
                    showError('Update failed: Server error or file exceeds server limit.');
                }
            }
        });

        xhr.addEventListener('error', function() {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa fa-save mr-1"></i> Update Video';
            showError('Network error occurred. Please try again.');
        });

        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send(formData);
    });
});
</script>
@endpush
