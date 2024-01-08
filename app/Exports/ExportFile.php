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
      
        //$sumDoanhThu = TableOrder::where('status', 'dathanhtoan');
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
                $event->sheet->getDelegate()->mergeCells('J2:J');
            },
            // AfterSheet::class => function (AfterSheet $event) {
            //     // Tính tổng cho cột B, bắt đầu từ hàng 2 (index 1)
            //     $event->sheet->setCellValue('H'.($event->sheet->getDelegate()->getHighestRow() + 1), '=SUM(H2:H'.$event->sheet->getDelegate()->getHighestRow().')');
            // },
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
        return [
            $order->code,
            $order->fullname,
            $order->email,
            $order->phone,
            $order->address,
            $order->content,
            $order->payment,
            $order->total_price,
            $order->created_at,

        ];
    }
}
