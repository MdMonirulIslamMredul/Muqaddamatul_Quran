@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h4 class="card-title mb-0 fw-bold" style="color: #212529;">Admission Guidelines & Fee Structures</h4>
                        <small class="text-muted">Manage multi-language admission details, procedures, fee structures, and payment terms</small>
                    </div>
                    {{-- <div>
                        <a href="{{ route('admission-guidelines.create') }}" class="btn btn-primary px-3 shadow-sm">
                            <i class="fa fa-plus-circle me-1"></i> Add Guideline Section
                        </a>
                    </div> --}}
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;" class="text-center">#</th>
                                    <th style="width: 260px;">Section Title</th>
                                    <th style="width: 140px;">Languages</th>
                                    <th>Configured Content</th>
                                    <th style="width: 140px;">Last Updated</th>
                                    <th class="text-center" style="width: 160px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($guidelines as $key => $guideline)
                                    <tr>
                                        <td class="text-center fw-bold text-muted">{{ $guidelines->firstItem() ? $guidelines->firstItem() + $key : $key + 1 }}</td>
                                        <td>
                                            <span class="fw-bold text-dark d-block">{{ $guideline->section_title }}</span>
                                            @if($guideline->section_title_bn)
                                                <small class="text-muted d-block"><strong class="text-success">BN:</strong> {{ $guideline->section_title_bn }}</small>
                                            @endif
                                            @if($guideline->section_title_ab)
                                                <small class="text-muted d-block" dir="rtl"><strong class="text-warning">AB:</strong> {{ $guideline->section_title_ab }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <span class="badge {{ $guideline->section_title || $guideline->details ? 'bg-primary' : 'bg-secondary' }}" style="font-size: 11px;">EN</span>
                                                <span class="badge {{ $guideline->section_title_bn || $guideline->details_bn ? 'bg-success' : 'bg-secondary' }}" style="font-size: 11px;">BN</span>
                                                <span class="badge {{ $guideline->section_title_ab || $guideline->details_ab ? 'bg-warning text-dark' : 'bg-secondary' }}" style="font-size: 11px;">AB</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1">
                                                @if($guideline->details || $guideline->details_bn || $guideline->details_ab)
                                                    <span class="badge" style="background-color: #007bff; color: #ffffff; padding: 4px 7px; font-size: 11px;"><i class="fa fa-align-left me-1"></i> Details</span>
                                                @endif
                                                @if($guideline->process || $guideline->process_bn || $guideline->process_ab)
                                                    <span class="badge" style="background-color: #28a745; color: #ffffff; padding: 4px 7px; font-size: 11px;"><i class="fa fa-tasks me-1"></i> Process</span>
                                                @endif
                                                @if($guideline->admission_fees || $guideline->admission_fees_bn || $guideline->admission_fees_ab)
                                                    <span class="badge" style="background-color: #17a2b8; color: #ffffff; padding: 4px 7px; font-size: 11px;"><i class="fa fa-tag me-1"></i> Admission Fee</span>
                                                @endif
                                                @if($guideline->monthly_fees || $guideline->monthly_fees_bn || $guideline->monthly_fees_ab)
                                                    <span class="badge" style="background-color: #ffc107; color: #212529; padding: 4px 7px; font-size: 11px;"><i class="fa fa-calendar me-1"></i> Monthly Fee</span>
                                                @endif
                                                @if($guideline->others_fees || $guideline->others_fees_bn || $guideline->others_fees_ab)
                                                    <span class="badge" style="background-color: #6c757d; color: #ffffff; padding: 4px 7px; font-size: 11px;"><i class="fa fa-plus-circle me-1"></i> Others Fee</span>
                                                @endif
                                                @if($guideline->payment_rules || $guideline->payment_rules_bn || $guideline->payment_rules_ab)
                                                    <span class="badge" style="background-color: #343a40; color: #ffffff; padding: 4px 7px; font-size: 11px;"><i class="fa fa-shield me-1"></i> Payment Rules</span>
                                                @endif
                                                @if((!empty($guideline->points) && is_array($guideline->points)) || (!empty($guideline->points_bn) && is_array($guideline->points_bn)) || (!empty($guideline->points_ab) && is_array($guideline->points_ab)))
                                                    <span class="badge" style="background-color: #e7f1ff; color: #0c63e4; border: 1px solid #b6d4fe; padding: 4px 7px; font-size: 11px;"><i class="fa fa-list-ol me-1"></i> Points</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $guideline->updated_at ? $guideline->updated_at->format('d M, Y') : 'N/A' }}</small>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admission-guidelines.show', $guideline->id) }}" class="btn btn-outline-info" title="View Details">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admission-guidelines.edit', $guideline->id) }}" class="btn btn-outline-primary" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admission-guidelines.destroy', $guideline->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this guideline section?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="fa fa-info-circle fa-2x mb-2 d-block text-secondary"></i>
                                            <span class="fw-semibold">No admission guidelines found.</span>
                                            <div class="mt-2">
                                                <a href="{{ route('admission-guidelines.create') }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus-circle me-1"></i> Add Guideline Section
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($guidelines->hasPages())
                    <div class="card-footer bg-white border-top py-3 d-flex justify-content-end">
                        {{ $guidelines->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
