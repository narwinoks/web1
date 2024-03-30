@foreach ($bookings as $key => $booking)
    @php
        $data = json_decode($booking->content, true);
    @endphp
    <li class="position-relative booking">
        <div class="media">
            <div class="msg-img">
                <img src="{{ asset('assets/img/avatar2.png') }}" alt="avatar" class="img-custom">
            </div>
            <div class="media-body">
                <h5 class="mb-4">{{ $data['option'] ?? '' }} <span
                        class="badge  {{ $booking->status == 'Reject' ? 'badge-danger' : ($booking->status == 'approval' ? 'badge-success' : 'badge-primary') }}
                        mx-3">{{ $booking->status }}</span>
                </h5>
                <div class="mb-3">
                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Date:</span>
                    <span class="bg-light-blue">{{ date('d-m-Y H:i:s', strtotime($booking->created_at)) ?? '' }}</span>
                </div>
                <div class="mb-3">
                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Date:</span>
                    <span class="bg-light-danger">{{ date('d-m-Y H:i:s', strtotime($data['date'])) ?? '' }}</span>
                </div>
                <div class="mb-3">
                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Details:</span>
                    <span class="bg-light-blue">{{ $data['detail'] ?? '' }}</span>
                </div>
                <div class="mb-3">
                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Noted:</span>
                    <span class="bg-light-blue">{{ $data['notes'] ?? '' }}</span>
                </div>
                <div class="mb-3">
                    <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Clients:</span>
                    <span class="border-right pr-2 mr-2">{{ $data['name'] ?? '' }} X
                        {{ $data['namecpp'] ?? '' }}</span>
                    <span class="border-right pr-2 mr-2"> {{ $data['email'] ?? '' }}</span>
                    <span>{{ $data['whatsapp'] ?? '' }}</span>
                </div>
                <div class="mb-5">
                    <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Instagram:</span>
                    <span class="border-right pr-2 mr-2">{{ $data['instagram'] ?? ('' ?? '') }} X
                        {{ $data['instaramcp'] ?? '' }}</span>
                </div>
                <a href="https://wa.me/{{ $data['whatsapp'] ?? '/' }}" target="_blank" class="btn-gray">Send
                    Message</a>
            </div>
        </div>
        <div class="buttons-to-right">
            <a href="#" class="btn-gray mr-2 btn-reject" data-id="{{ $booking->id }}"><i
                    class="far fa-times-circle mr-2"></i> Reject</a>
            <a href="#" data-id="{{ $booking->id }}" class="btn-gray btn-approval"><i
                    class="far fa-check-circle mr-2"></i> Approve</a>
        </div>
    </li>
@endforeach
