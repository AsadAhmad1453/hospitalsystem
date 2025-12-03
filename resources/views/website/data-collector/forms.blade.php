@extends('website.layouts.data-collector-layout')
@section('custom-css')
   <style>
        :root {
            --dc-primary: #0d7a65;
            --dc-primary-dark: #064337;
            --dc-light: #f6fbf8;
            --dc-border: #d7ebe2;
        }

        .forms-hero {
            background: linear-gradient(130deg, #0d7a65, #03382c);
            color: #fff;
            border-radius: 28px;
            padding: 2.2rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 20px 45px rgba(5, 49, 38, 0.25);
        }

        .forms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
        }

        .form-card {
            background: #fff;
            border-radius: 20px;
            padding: 1.8rem;
            min-height: 190px;
            border: 1px solid transparent;
            box-shadow: 0 18px 30px rgba(6, 51, 40, 0.08);
            position: relative;
            overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .form-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(13,122,101,0.12), rgba(6,67,55,0.05));
            opacity: 0;
            transition: opacity .25s ease;
        }

        .form-card:hover {
            transform: translateY(-6px);
            border-color: var(--dc-border);
            box-shadow: 0 25px 40px rgba(6, 67, 55, 0.18);
        }

        .form-card:hover::after {
            opacity: 1;
        }

        .form-card__content {
            position: relative;
            z-index: 1;
            color: var(--dc-primary-dark);
        }

        .form-card__icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: rgba(13, 122, 101, 0.15);
            color: var(--dc-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .form-card__title {
            font-weight: 700;
            font-size: 1.15rem;
        }

        .forms-empty {
            border-radius: 24px;
            background: var(--dc-light);
            border: 1px dashed var(--dc-border);
            padding: 2rem;
        }

        @media (max-width: 575px) {
            .forms-hero {
                border-radius: 20px;
                padding: 1.6rem;
            }
        }
   </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="forms-hero">
            <p class="text-uppercase mb-2">Choose a workflow</p>
            <h2 class="mb-1 text-white">Data collector forms</h2>
            <p class="mb-0">Pick the flow that fits your patient’s visit. Everything is optimized for quick capture and mobile use.</p>
        </div>
        @if($forms->isEmpty())
            <div class="forms-empty text-center">
                <h5 class="mb-2 text-muted">No forms are available right now</h5>
                <p class="mb-0 text-muted">Please check back later or contact the administrator to publish new forms.</p>
            </div>
        @else
            <div class="forms-grid">
                @foreach ($forms as $form )
                    <a href="{{ route('open-data-collector', ['form_id' => $form->id, 'patient_id' => $patient_id]) }}" class="text-decoration-none">
                        <div class="form-card">
                            <div class="form-card__content">
                                <div class="form-card__icon">
                                    <i data-feather="layers"></i>
                                </div>
                                <div>
                                    <p class="form-card__title mb-1">{{ $form->name }}</p>
                                    <p class="text-muted mb-0 small">Tap to open the step-by-step collector</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
