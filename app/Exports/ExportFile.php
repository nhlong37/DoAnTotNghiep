<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\TableProduct;
use App\Models\TableBrand;
use League\CommonMark\Extension\Table\Table;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportFile implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dsProduct = TableProduct::all();
        // $dsBrand = TableBrand::where('id',$dsProduct->id_brand);
        return $dsProduct;
    }

    public function columnWidths(): array
    {
        return [
            'Tên sản phẩm' => 300,
        ];
    }

    public function headings(): array {
        return [
            "Mã sản phẩm",
            'Tên sản phẩm',
            "Giá mới",
            "Giá cũ",
            // "Thương hiệu"
        ];
    }

    public function map($product): array {
        return [
            $product->code,
            $product->name,
            $product->sale_price,
            $product->price_regular,
    
        ];
    }
}
