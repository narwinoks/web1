@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-12 col-12">
        <div class="card-question mb-2 w-100">
            <div class="card-question-header">
                <h6 class="card-question-title">
                    <a class="text-muted faq-head" data-toggle="collapse" href="#question-{{ $key }}">
                        <i class="fas fa-question-circle pr-3 mt-0-20 pull-left" style="
                        margin: 3px 5px 0 0;"></i>
                        {{ $data['question'] ?? 'Null' }}
                        <i class="fas fa-minus mr-2 text-slate pull-right"></i>
                    </a>
                </h6>
            </div>
            <div id="question-{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}">
                <div class="card-question-body">
                    <p>
                        {!! $data['answer'] ?? 'Null' !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
<style>
.faq-head{
    z-index: 1;
    flex: 1;
    position: relative;
    font-weight: bold;
    font-size: 15px;
    color: #424242;
}

</style>
