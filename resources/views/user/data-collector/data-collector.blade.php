@extends('user.layouts.main')   
@section('custom-css')
<link rel="stylesheet" href="{{ asset('admin-assets/css/custom-css.css') }}">
<style>
    

</style>
@endsection
@section('content')
<section id="multiple-column-form">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card shadow">
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                        <form action="{{ route('save-data-collector') }}" method="POST">
                            @csrf
                            <div class="formbold-steps" >
                                {{-- list all the sections --}}
                                <div class="sections-slider-wrapper">
                                    <ul class="">
                                        @foreach ($sections as $section)
                                            <li class="formbold-step-menu{{ $loop->index+1 }} section-item" data-section-id="{{ $section->id }}">
                                                <span>{{ $loop->index+1 }}</span>
                                                {{ $section->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" id="patient_id" name="patient_id" value="{{ $patientId }}">
                            @foreach ($questions as $index => $question)
                                <div class="question-block" id="question-{{ $index }}" style="{{ $index == 0 ? '' : 'display:none;' }}">
                                    <div class="question-step">
                                        <div class="my-3 text-center">
                                            <strong class="h2">{{ $question->question }}</strong>
                                        </div>
                                        @if($question->question_type == '0' || $question->question_type == '1')
                                        <div class="options-grid">
                                            @foreach ($question->options as $option)
                                                @if($question->question_type == '0')
                                                    <div class="option-box-wrapper">
                                                        <input id="q{{ $question->id }}_{{ $option->id }}" type="radio" name="{{ $question->id }}" value="{{ $option->id }}" data-option-id="{{ $option->id }}" class="option-radio">
                                                        <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                    </div>
                                                @elseif($question->question_type == '1')
                                                    <div class="option-box-wrapper">
                                                        <input id="q{{ $question->id }}_{{ $option->id }}" type="checkbox" name="{{ $question->id }}[]" value="{{ $option->id }}" data-option-id="{{ $option->id }}" class="option-checkbox">
                                                        <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                        </div>
                                        <span id="answer-warning{{ $question->id }}" class="d-block  text-danger my-2"></span>

                                        @elseif($question->question_type == '2')
                                        <div class="d-flex justify-content-center">
                                            <input type="text" class="w-50 form-control" name="{{ $question->id }}" placeholder="Type your answer...">
                                        </div>
                                        @elseif($question->question_type == '3')
                                        <div class="d-flex justify-content-center">
                                            <input type="date" class="w-50 form-control" name="{{ $question->id }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="formbold-form-btn-wrapper col-12 ">
                                <div class="col-2 d-flex justify-content-between    ">
                                    <button id="prev-btn" class=" formbold-back-btn">
                                        Back
                                    </button>
                                </div>
                                <div class="col-7"></div>
                                <div class="col-3  d-flex justify-content-end">
                                    <button id="next-btn" class="formbold-btn float-right mr-0">
                                        Next Step
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                        <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1675_1807">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </button>
                                    <button id="submit-btn" class="formbold-btn">
                                        Submit
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                        <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1675_1807">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('custom-js')

<script>
$(document).ready(function() {
    var questions = @json($questions);
    var dependencies = @json($dependencies);
    var current = 0;
    var total = questions.length;
    var skipped = {}; // {index: true} for skipped questions

    function updateButtons() {
        $('#prev-btn').toggle(current > 0);
        $('#next-btn').toggle(current < total - 1);
        $('#submit-btn').toggle(current === total - 1);
    }

    function updateActiveSection(questionIdx) {
        var sectionId = questions[questionIdx]?.section?.id;
        if (!sectionId) return;

       $('.section-item').removeClass('active');
        var $activeItem = $('.section-item[data-section-id="' + sectionId + '"]');
        $activeItem.addClass('active');

        // Smooth scroll into view (only horizontally)
        $activeItem[0].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
 }

    function showQuestion(idx) {
        $('.question-block').hide();
        $('#question-' + idx).show();
        updateButtons();
        updateActiveSection(idx);
    }

    function disableQuestion(idx) {
        skipped[idx] = true;
        $('#question-' + idx).find('input,select,textarea').prop('disabled', true);
    }

    function enableQuestion(idx) {
        skipped[idx] = false;
        $('#question-' + idx).find('input,select,textarea').prop('disabled', false);
    }

    // Next button logic
    $('#next-btn').click(function(e) {
        e.preventDefault();
        var q = questions[current];
        var answered = false;
        if (q.question_type == 0) {
            answered = $('input[name="' + q.id + '"]:checked').length > 0;
        } else if (q.question_type == 1) {
            answered = $('input[name="' + q.id + '[]"]:checked').length > 0;
        } else if (q.question_type == 2 || q.question_type == 3) {
            answered = $('input[name="' + q.id + '"]').val().trim() !== '';
        }
        if (!answered) {
            $('#answer-warning' + q.id + '').text('Please answer this question before proceeding!').show();
            return;
        }
        $('#answer-warning' + q.id + '').hide();

        // Dependency jump for radio
        var selectedOptionId = null;
        if (q.question_type == 0) {
            selectedOptionId = $('input[name="' + q.id + '"]:checked').data('option-id');
            var jumpToQid = null;
            dependencies.forEach(function(dep) {
                if (dep.question_id == q.id && dep.option_id == selectedOptionId) {
                    jumpToQid = dep.dependent_question_id;
                }
            });
            if (jumpToQid) {
                var depIdx = questions.findIndex(q => q.id == jumpToQid);
                // Disable skipped questions between current and depIdx
                var min = Math.min(current, depIdx), max = Math.max(current, depIdx);
                for (var i = min + 1; i < max; i++) {
                    skipped[i] = true;
                    $('#question-' + i).find('input,select,textarea').prop('disabled', true);
                }
                current = depIdx;
                showQuestion(current);
                return;
            }
        }

        // Default: next question
        if (current < total - 1) {
            current++;
            showQuestion(current);
        }
    });

    // Prev button logic
    $('#prev-btn').click(function(e) {
        e.preventDefault();
        var prev = current - 1;
        while (prev >= 0 && skipped[prev]) {
            prev--;
        }
        if (prev >= 0) {
            current = prev;
            showQuestion(current);
        }
    });

    // Dependency jump logic for radios
    $('.option-radio').on('change', function() {
        
        var $this = $(this);
        var qIdx = $('.question-block:visible').index('.question-block');
        var qId = questions[qIdx].id;
        var selectedOptId = $this.data('option-id');
        var jumpToQid = null;
        dependencies.forEach(function(dep) {
            if (dep.question_id == qId && dep.option_id == selectedOptId) {
                jumpToQid = dep.dependent_question_id;
            }
        });
        if (jumpToQid) {
            // Find the index of the dependent question
            var depIdx = questions.findIndex(q => q.id == jumpToQid);
            // Disable skipped questions between current and depIdx
            var min = Math.min(qIdx, depIdx), max = Math.max(qIdx, depIdx);
            for (var i = min + 1; i < max; i++) {
                disableQuestion(i);
            }
            current = depIdx;
            showQuestion(current);
        } else {
            // No dependency: re-enable all skipped questions after current
            for (var i = current + 1; i < total; i++) {
                if (skipped[i]) {
                    skipped[i] = false;
                    $('#question-' + i).find('input,select,textarea').prop('disabled', false);
                }
            }
            if (current < total - 1) {
                showQuestion(++current);
            }
        }
    });

    // On submit, remove disabled/skipped answers
    $('#submit-btn').click(function(e) {
        $('.question-block:visible input, .question-block:visible select, .question-block:visible textarea').prop('disabled', false);
        $('.question-block').each(function(idx) {
            if (skipped[idx]) {
                $(this).find('input,select,textarea').prop('disabled', true);
            }
        });
        // Now submit the form or collect answers as needed
    });

    // Initial show
    showQuestion(current);
});
</script>
@endsection

