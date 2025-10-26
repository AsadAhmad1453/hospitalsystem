@extends('patient.layouts.main')

@section('custom-css')
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        transition: all 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.12);
    }
    .folder-list-item {
        transition: background-color 0.2s ease;
        border-bottom: 1px solid #f1f1f1;
        cursor: pointer;
    }
    .folder-list-item:hover {
        background-color: #f9f9f9;
    }
    .folder-list-item i {
        color: #198754;
    }
    .file-row {
        background-color: #fafafa;
        border-bottom: 1px solid #eee;
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .file-row:hover {
        background-color: #f1f1f1;
    }
    .text-theme {
        color: #198754;
    }

    /* --- Minimal Action Buttons --- */
    .action-btn {
        height: 20px;
        border-radius: 50%;
        border: none;
        background-color: transparent;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
    }
    .action-btn:hover {
        background-color: #f2f2f2;
        color: #198754;
        transform: translateY(-2px);
    }
    .action-btn i {
        font-size: 0.8rem;
    }

    .search-wrap input {
        border-radius: 6px !important;
        border-color: #ddd;
    }
    .modal-content {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .modal-header, .modal-footer {
        border: none;
    }
    .form-control, .form-select {
        border-radius: 8px;
    }

    .breadcrumb-item+.breadcrumb-item:before {
      content: '' !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid mt-3">

    {{-- Breadcrumb --}}
    <div class="bg-light rounded px-3 py-2 mb-3 shadow-sm">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{route('patient-dashboard')}}">Dashboard</a> <i class="fa fa-angle-right"></i></li>
                <li class="breadcrumb-item active">Medical Reports</li>
            </ol>
        </nav>
    </div>

    {{-- Top Bar --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="input-group input-group-sm search-wrap">
            <span class="input-group-text bg-light border-end-0"><i class="fa fa-search"></i></span>
            <input class="form-control form-control-sm border-start-0" type="search" placeholder="Search your files...">
        </div>
        <div class="d-flex gap-2 mt-2">
            <button class="btn btn-sm btn-outline-theme" data-bs-toggle="modal" data-bs-target="#uploadfile">
                <i class="fa fa-upload me-1"></i> Upload
            </button>
            <button class="btn btn-sm btn-outline-secondary">
                <i class="fa fa-folder-plus me-1"></i> New Folder
            </button>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-file text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">1,254</h5>
                <p class="small text-muted mb-0">Document Files</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-image text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">320</h5>
                <p class="small text-muted mb-0">Images</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-video text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">165</h5>
                <p class="small text-muted mb-0">Videos</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center p-3 bg-light">
                <i class="fa fa-cloud text-theme fs-3 mb-2"></i>
                <h5 class="fw-bold mb-0">89%</h5>
                <p class="small text-muted mb-0">Storage Used</p>
                <div class="progress mt-2" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 89%;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Folders List --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h6 class="fw-bold text-dark mb-0">Folders</h6>
        <a href="#" class="text-muted small">View All</a>
    </div>
    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="accordion" id="folderAccordion">
                @foreach(['Medical Reports','X-Rays','Prescriptions','Lab Results','Billing Records','Insurance Docs'] as $index => $folder)
                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button fs-small collapsed bg-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                            <i class="fa fa-folder text-theme me-2"></i> {{ $folder }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#folderAccordion">
                        <div class="accordion-body p-0">
                            @foreach(['file1.pdf','file2.docx','scan1.png'] as $file)
                            <div class="file-row">
                                <span><i class="fa fa-file me-2 text-theme"></i> {{ $file }}</span>
                                <div class="d-flex ">
                                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewFileModal"><i class="fa fa-eye"></i></button>
                                    <button class="action-btn"><i class="fa fa-pen"></i></button>
                                    <button class="action-btn"><i class="fa fa-download"></i></button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Recent Files --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h6 class="fw-bold text-dark mb-0">Recent Files</h6>
        <a href="#" class="text-muted small">View All</a>
    </div>
    <div class="row g-3">
        @foreach([['xray-portal.pdf','PDF'],['blood-report.docx','DOCX'],['lab-result.png','IMG'],['prescription-2025.pdf','PDF']] as $file)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 p-3 text-center">
                <i class="fa fa-file-alt text-theme fs-2 mb-2"></i>
                <p class="fw-semibold mb-1 mt-2">{{ $file[0] }}</p>
                <p class="small text-muted mb-0">Uploaded: 28/09/2025</p>
                <div class="d-flex justify-content-center gap-2 mt-2">
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewFileModal"><i class="fa fa-eye"></i></button>
                    <button class="action-btn"><i class="fa fa-pen"></i></button>
                    <button class="action-btn"><i class="fa fa-download"></i></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Recent Activity --}}
    <div class="card mt-5 shadow-sm">
        <div class="card-header bg-light fw-semibold">Recent Activity</div>
        <div class="card-body">
            <ul class="list-group list-group-flush small">
                <li class="list-group-item d-flex justify-content-between">
                    <span><i class="fa fa-upload text-theme me-2"></i> You uploaded <strong>blood-report.docx</strong></span>
                    <span class="text-muted">2 mins ago</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span><i class="fa fa-edit text-theme me-2"></i> File <strong>xray-portal.pdf</strong> edited</span>
                    <span class="text-muted">15 mins ago</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span><i class="fa fa-share text-theme me-2"></i> Shared <strong>lab-result.png</strong> with Dr. Ryan</span>
                    <span class="text-muted">1 hr ago</span>
                </li>
            </ul>
        </div>
    </div>

</div>

{{-- View File Modal --}}
<div class="modal fade" id="viewFileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="mb-0">File Details</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <p><strong>File Name:</strong> blood-report.pdf</p>
              <p><strong>Uploaded On:</strong> 12 Oct 2025</p>
              <p><strong>Folder:</strong> Medical Reports</p>
              <p><strong>Size:</strong> 1.2 MB</p>
              <p class="mb-0"><strong>Description:</strong> Blood test report with details of CBC and lipid profile.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success"><i class="fa fa-download me-1"></i> Download</button>
          </div>
      </div>
  </div>
</div>

{{-- Upload Modal --}}
<div class="modal fade" id="uploadfile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="mb-0">Upload New File</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" id="filename" class="form-control" placeholder="File Name">
                        <label for="filename">File Name</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Select File</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select">
                            <option selected disabled>Choose Folder</option>
                            <option>Medical Reports</option>
                            <option>Prescriptions</option>
                            <option>X-Rays</option>
                        </select>
                        <label>Folder</label>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
