@extends('layouts.index')

@section('title', $title)
@section('title', $description)

@section('content')

<div class="container pt-lg-5 pt-3 pb-lg-5 pb-3 text-break info info-special">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center pb-3">
                {{ $adi }}
            </h1>
        </div>
        <div class="@if ($id == 13) col-6 @else col-12 @endif">
            {!! $yazi !!}
        </div>
        @if ($id == 13)
            <div class="col-6">
                <form class="contact_us" novalidate>
                    <div x-data="$store.contact">
                        <div class="form-group pt-3">
                            <label for="name">{{ __('main.contact-page.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        <div class="form-group pt-3">
                            <label for="mail">{{ __('main.contact-page.mail') }}</label>
                            <input type="email" class="form-control" name="mail" id="mail" required>
                        </div>

                        <div class="form-group pt-3">
                            <label for="message">{{ __('main.contact-page.message') }}</label>
                            <textarea class="form-control" rows="5" name="note" id="note" required></textarea>
                        </div>

                        <button type="submit" id="button" class="clasic-btn blue-btn ms-0" >{{ __('main.submit') }}</button>
                    </div>
                </form>
            </div>
        @endif
        @if ($id == 4)
            <div class="col-lg-8 col-12 m-auto" itemscope itemtype="https://schema.org/FAQPage">
                <div class="container">
                    <h2 class="text-center mt-5 mb-4">{{ __('audio_guide_system_faq.faq_one.title') }}</h2>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_1" itemprop="name">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
                                    {!! __('audio_guide_system_faq.faq_one.question1') !!}
                                </button>
                            </h2>
                            <div id="collapse_1" class="accordion-collapse collapse show" aria-labelledby="heading_1" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer1') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_2" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                    {!! __('audio_guide_system_faq.faq_one.question2') !!}
                                </button>
                            </h2>
                            <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer2') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_3" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                                    {!! __('audio_guide_system_faq.faq_one.question3') !!}
                                </button>
                            </h2>
                            <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer3') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_4" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                    {!! __('audio_guide_system_faq.faq_one.question4') !!}
                                </button>
                            </h2>
                            <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer4') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_5" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                    {!! __('audio_guide_system_faq.faq_one.question5') !!}
                                </button>
                            </h2>
                            <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer5') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_6" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_6" aria-expanded="false" aria-controls="collapse_6">
                                    {!! __('audio_guide_system_faq.faq_one.question6') !!}
                                </button>
                            </h2>
                            <div id="collapse_6" class="accordion-collapse collapse" aria-labelledby="heading_6" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer6') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_7" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_7" aria-expanded="false" aria-controls="collapse_7">
                                    {!! __('audio_guide_system_faq.faq_one.question7') !!}
                                </button>
                            </h2>
                            <div id="collapse_7" class="accordion-collapse collapse" aria-labelledby="heading_7" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('audio_guide_system_faq.faq_one.answer7') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($id == 5)
            <div class="col-lg-8 col-12 m-auto" itemscope itemtype="https://schema.org/FAQPage">
                <div class="container">
                    <h2 class="text-center">{{ __('publish_audio_guide_faq.faq_one.title') }}</h2>
                    <div class="desc text-center mt-3 mb-4">{{ __('publish_audio_guide_faq.faq_one.description') }}</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_1" itemprop="name">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
                                    {{ __('publish_audio_guide_faq.faq_one.question1') }}
                                </button>
                            </h2>
                            <div id="collapse_1" class="accordion-collapse collapse show" aria-labelledby="heading_1" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer1') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_2" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                    {{ __('publish_audio_guide_faq.faq_one.question2') }}
                                </button>
                            </h2>
                            <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer2') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_3" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                                    {{ __('publish_audio_guide_faq.faq_one.question3') }}
                                </button>
                            </h2>
                            <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer3') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_4" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                    {{ __('publish_audio_guide_faq.faq_one.question4') }}
                                </button>
                            </h2>
                            <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer4') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_5" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                                    {{ __('publish_audio_guide_faq.faq_one.question5') }}
                                </button>
                            </h2>
                            <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer5') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_6" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_6" aria-expanded="false" aria-controls="collapse_6">
                                    {{ __('publish_audio_guide_faq.faq_one.question6') }}
                                </button>
                            </h2>
                            <div id="collapse_6" class="accordion-collapse collapse" aria-labelledby="heading_6" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer6') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_7" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_7" aria-expanded="false" aria-controls="collapse_7">
                                    {{ __('publish_audio_guide_faq.faq_one.question7') }}
                                </button>
                            </h2>
                            <div id="collapse_7" class="accordion-collapse collapse" aria-labelledby="heading_7" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <iframe width="100%" height="450" src="{{ __('publish_audio_guide_faq.faq_one.answer7') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading_8" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_8" aria-expanded="false" aria-controls="collapse_8">
                                    {{ __('publish_audio_guide_faq.faq_one.question8') }}
                                </button>
                            </h2>
                            <div id="collapse_8" class="accordion-collapse collapse" aria-labelledby="heading_8" data-bs-parent="#accordionExample" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    <a href="/images/pdf/{{ __('publish_audio_guide_faq.faq_one.answer8_2') }}" target="_blank" class="d-flex"><i class="fa-regular fa-file-pdf pe-2 pt-2"></i><label>{!!  __('publish_audio_guide_faq.faq_one.answer8_1') !!}</label></a><br>
                                    <a href="/images/pdf/{{ __('publish_audio_guide_faq.faq_one.answer8_4') }}" target="_blank" class="d-flex"><i class="fa-regular fa-file-pdf pe-2 pt-2"></i><label>{!! __('publish_audio_guide_faq.faq_one.answer8_3') !!}</label></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-center mt-5 mb-3">{{ __('publish_audio_guide_faq.faq_two.title') }}</h2>
                    <div class="accordion" id="accordionExample2">
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_1" itemprop="name">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_1" aria-expanded="true" aria-controls="collapse2_1">
                                    {{ __('publish_audio_guide_faq.faq_two.question1') }}
                                </button>
                            </h2>
                            <div id="collapse2_1" class="accordion-collapse collapse show" aria-labelledby="heading2_1" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer1') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_2" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_2" aria-expanded="false" aria-controls="collapse2_2">
                                    {{ __('publish_audio_guide_faq.faq_two.question2') }}
                                </button>
                            </h2>
                            <div id="collapse2_2" class="accordion-collapse collapse" aria-labelledby="heading2_2" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer2') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_3" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_3" aria-expanded="false" aria-controls="collapse2_3">
                                    {{ __('publish_audio_guide_faq.faq_two.question3') }}
                                </button>
                            </h2>
                            <div id="collapse2_3" class="accordion-collapse collapse" aria-labelledby="heading2_3" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer3') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_4" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_4" aria-expanded="false" aria-controls="collapse2_4">
                                    {{ __('publish_audio_guide_faq.faq_two.question4') }}
                                </button>
                            </h2>
                            <div id="collapse2_4" class="accordion-collapse collapse" aria-labelledby="heading2_4" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer4') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_5" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_5" aria-expanded="false" aria-controls="collapse2_5">
                                    {{ __('publish_audio_guide_faq.faq_two.question5') }}
                                </button>
                            </h2>
                            <div id="collapse2_5" class="accordion-collapse collapse" aria-labelledby="heading2_5" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer5') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_6" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_6" aria-expanded="false" aria-controls="collapse2_6">
                                    {{ __('publish_audio_guide_faq.faq_two.question6') }}
                                </button>
                            </h2>
                            <div id="collapse2_6" class="accordion-collapse collapse" aria-labelledby="heading2_6" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer6') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading2_7" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2_7" aria-expanded="false" aria-controls="collapse2_7">
                                    {{ __('publish_audio_guide_faq.faq_two.question7') }}
                                </button>
                            </h2>
                            <div id="collapse2_7" class="accordion-collapse collapse" aria-labelledby="heading2_7" data-bs-parent="#accordionExample2" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_two.answer7') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-center mt-5 mb-3">{{ __('publish_audio_guide_faq.faq_three.title') }}</h2>
                    <div class="desc text-center mt-3 mb-4">{{ __('publish_audio_guide_faq.faq_three.description') }}</div>
                    <div class="accordion" id="accordionExample3">
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_1" itemprop="name">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_1" aria-expanded="true" aria-controls="collapse3_1">
                                    {{ __('publish_audio_guide_faq.faq_three.question1') }}
                                </button>
                            </h2>
                            <div id="collapse3_1" class="accordion-collapse collapse show" aria-labelledby="heading3_1" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_three.answer1') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_2" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_2" aria-expanded="false" aria-controls="collapse3_2">
                                    {{ __('publish_audio_guide_faq.faq_three.question2') }}
                                </button>
                            </h2>
                            <div id="collapse3_2" class="accordion-collapse collapse" aria-labelledby="heading3_2" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_three.answer2') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_3" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_3" aria-expanded="false" aria-controls="collapse3_3">
                                    {{ __('publish_audio_guide_faq.faq_three.question3') }}
                                </button>
                            </h2>
                            <div id="collapse3_3" class="accordion-collapse collapse" aria-labelledby="heading3_3" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_three.answer3') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_4" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_4" aria-expanded="false" aria-controls="collapse3_4">
                                    {{ __('publish_audio_guide_faq.faq_three.question4') }}
                                </button>
                            </h2>
                            <div id="collapse3_4" class="accordion-collapse collapse" aria-labelledby="heading3_4" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {{ __('publish_audio_guide_faq.faq_three.answer4') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_5" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_5" aria-expanded="false" aria-controls="collapse3_5">
                                    {{ __('publish_audio_guide_faq.faq_three.question5') }}
                                </button>
                            </h2>
                            <div id="collapse3_5" class="accordion-collapse collapse" aria-labelledby="heading3_5" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer5') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_6" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_6" aria-expanded="false" aria-controls="collapse3_6">
                                    {{ __('publish_audio_guide_faq.faq_three.question6') }}
                                </button>
                            </h2>
                            <div id="collapse3_6" class="accordion-collapse collapse" aria-labelledby="heading3_6" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer6') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_7" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_7" aria-expanded="false" aria-controls="collapse3_7">
                                    {{ __('publish_audio_guide_faq.faq_three.question7') }}
                                </button>
                            </h2>
                            <div id="collapse3_7" class="accordion-collapse collapse" aria-labelledby="heading3_7" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer7') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_8" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_8" aria-expanded="false" aria-controls="collapse3_8">
                                    {{ __('publish_audio_guide_faq.faq_three.question8') }}
                                </button>
                            </h2>
                            <div id="collapse3_8" class="accordion-collapse collapse" aria-labelledby="heading3_8" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer8') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_9" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_9" aria-expanded="false" aria-controls="collapse3_9">
                                    {{ __('publish_audio_guide_faq.faq_three.question9') }}
                                </button>
                            </h2>
                            <div id="collapse3_9" class="accordion-collapse collapse" aria-labelledby="heading3_9" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer9') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_10" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_10" aria-expanded="false" aria-controls="collapse3_10">
                                    {{ __('publish_audio_guide_faq.faq_three.question10') }}
                                </button>
                            </h2>
                            <div id="collapse3_10" class="accordion-collapse collapse" aria-labelledby="heading3_10" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer10') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_11" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_11" aria-expanded="false" aria-controls="collapse3_11">
                                    {{ __('publish_audio_guide_faq.faq_three.question11') }}
                                </button>
                            </h2>
                            <div id="collapse3_11" class="accordion-collapse collapse" aria-labelledby="heading3_11" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer11') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_12" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_12" aria-expanded="false" aria-controls="collapse3_12">
                                    {{ __('publish_audio_guide_faq.faq_three.question12') }}
                                </button>
                            </h2>
                            <div id="collapse3_12" class="accordion-collapse collapse" aria-labelledby="heading3_12" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer12') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_13" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_13" aria-expanded="false" aria-controls="collapse3_13">
                                    {{ __('publish_audio_guide_faq.faq_three.question13') }}
                                </button>
                            </h2>
                            <div id="collapse3_13" class="accordion-collapse collapse" aria-labelledby="heading3_13" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer13') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_14" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_14" aria-expanded="false" aria-controls="collapse3_14">
                                    {{ __('publish_audio_guide_faq.faq_three.question14') }}
                                </button>
                            </h2>
                            <div id="collapse3_14" class="accordion-collapse collapse" aria-labelledby="heading3_14" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer14') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_15" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_15" aria-expanded="false" aria-controls="collapse3_15">
                                    {{ __('publish_audio_guide_faq.faq_three.question15') }}
                                </button>
                            </h2>
                            <div id="collapse3_15" class="accordion-collapse collapse" aria-labelledby="heading3_15" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer15') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_16" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_16" aria-expanded="false" aria-controls="collapse3_16">
                                    {{ __('publish_audio_guide_faq.faq_three.question16') }}
                                </button>
                            </h2>
                            <div id="collapse3_16" class="accordion-collapse collapse" aria-labelledby="heading3_16" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer16') !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h2 class="accordion-header" id="heading3_17" itemprop="name">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3_17" aria-expanded="false" aria-controls="collapse3_17">
                                    {{ __('publish_audio_guide_faq.faq_three.question17') }}
                                </button>
                            </h2>
                            <div id="collapse3_17" class="accordion-collapse collapse" aria-labelledby="heading3_17" data-bs-parent="#accordionExample3" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="accordion-body" itemprop="text">
                                    {!! __('publish_audio_guide_faq.faq_three.answer17') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
    <script>
        var notyf = new Notyf();
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.contact_us');
            
            Array.prototype.slice.call(forms).forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();

                        notyf.error({
                            message: "{{ __('main.contact-page.error') }}",
                            position: {y:'top'},
                            duration: 20000,
                            dismissible: true
                        });
                    }
                    else{
                        event.preventDefault();
                        event.stopPropagation();

                        $.ajax({
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: "/contact-us-send-mail",
                            method: "POST",
                            data: {
                                mailName: document.getElementById('name').value,
                                mailMail: document.getElementById('mail').value,
                                mailNote: document.getElementById('note').value,
                            }
                        }).done((data) => {
                            notyf.success({
                                message: "{{ __('main.contact-page.success') }}",
                                position: {y:'top'},
                                duration: 20000,
                                dismissible: true
                            });
                            document.getElementById("button").disabled = true;

                        }).fail((data) => {
                            notyf.error({
                                message: "{{ __('main.contact-page.error') }}",
                                position: {y:'top'},
                                duration: 20000,
                                dismissible: true
                            });
                        });
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endpush