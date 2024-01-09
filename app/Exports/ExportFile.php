<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\TableProduct;
use App\Models\TableBrand;
use App\Models\TableOrder;
use League\CommonMark\Extension\Table\Table;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExportFile implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $dsProduct = TableProduct::all();
        // $dsBrand = TableBrand::where('id',$dsProduct->id_brand);
        $dsHoaDon = TableOrder::where('status', 'dathanhtoan')->get();
               
        return $dsHoaDon;
    }

    public function columnWidths(): array
    {
        return [
            'Tên khách hàng' => 300,
            'Địa chỉ nhận' => 500,
            'Số điện thoại' => 200,
            'Email' => 500,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastRow = $event->sheet->getDelegate()->getHighestRow(); // Lấy số hàng cuối cùng

                // Merge từ ô A1 đến ô vô cùng của hàng 1
                $event->sheet->getDelegate()->mergeCells("J2:J{$lastRow}");
            },
           
        ];

    }

    public function headings(): array {
        return [
            "Mã hoá đơn",
            'Tên khách hàng',
            "Email",
            "Số điện thoại",
            "Địa chỉ nhận",
            "Ghi chú",
            "Phương thức thanh toán",
            "Tổng giá trị hoá đơn",
            "Ngày đặt",
            "Tổng doanh thu"
        ];
    }

    public function map($order): array {
        $tong = TableOrder::where('status', 'dathanhtoan')->get();
        $tam = 0 ;
        foreach ($tong as $key => $value) {
            $tam += $value->total_price;
        }
        return [
            $order->code,
            $order->fullname,
            $order->email,
            $order->phone,
            $order->address,
            $order->content,
            $order->payment,
            $order->total_price,
            $order->created_at->format('d/m/Y'),
            $tam,
        ];
    }
}
