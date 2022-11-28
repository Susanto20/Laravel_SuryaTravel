<tbody>
    @foreach ($syarat as $order)
        <tr class="border">
            <td class="border">{{ $loop->iteration }}</td>
            @foreach ($users->where('id', $order->user_id) as $user)
                <td class="border">{{ $user->name }}</td>
            @endforeach
            <td class="border">{{ $order->tujuan }}</td>
            <td class="border">{{ $order->tanggal_berangkat }}</td>
            <td class="border">{{ $order->jam }}</td>
            <td class="border">{{ $order->jumlah_kursi }}</td>
            {{-- <td>
                <a href="{{ asset('orders/' . $order->file) }}" target="__blank">
                    <img width="100" src="{{ asset('orders/' . $order->file) }}"
                        alt="">
                </a>
            </td> --}}
            <td class="border">{{ $order->total }}</td>
            @foreach ($users->where('id', $order->user_id) as $user)
                <td class="border">{{ $user->nomor_hp }}</td>
            @endforeach
            <td>
                <div class="flex justify-content bg-red">
                    @if ($order->status === 'Terkirim')
                        <form method="POST" action="{{ route('admin.proses', ['id' => $order->id]) }}">
                            @csrf
                            <input type="hidden" name="status" value="Diterima">
                            <button type="submit" class="btn btn-primary btn-sm" href="#">
                                Terima Pesanan
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.proses', ['id' => $order->id]) }}">
                            @csrf
                            <input type="hidden" name="status" value="Ditolak, kursi habis">
                            <button type="submit" class="btn btn-danger btn-sm" href="#">
                                &ensp;Tolak Pesanan
                            </button>
                        </form>
                    @endif
                    @if ($order->status === 'Diterima')
                        <form method="POST" action="{{ route('admin.proses', ['id' => $order->id]) }}">
                            @csrf
                            <input type="hidden" name="status" value="Dalam Proses">
                            <button type="submit" class="btn btn-secondary btn-sm" href="#">
                                Proses Pesanan
                            </button>
                        </form>
                    @endif
                    @if ($order->status === 'Dalam Proses')
                        <form method="POST" action="{{ route('admin.proses', ['id' => $order->id]) }}">
                            @csrf
                            <input type="hidden" name="status" value="Selesai">
                            <button type="submit" class="btn btn-success btn-sm" href="#">
                                Konfirmasi Pesanan
                            </button>
                        </form>
                    @endif
                    @if ($order->status === 'Selesai')
                        Pesanan Selesai
                    @endif
                    @if ($order->status === 'Ditolak, kursi habis')
                        <span class="text-danger">Pesanan Ditolak</span>
                    @endif

                </div>
            </td>
        </tr>
    @endforeach
</tbody>
