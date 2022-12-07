<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\StateType;
use App\Models\DocumentType;
use App\Models\VoucherType;
use App\Models\CurrencyType;
use App\Models\UnitMeasure;
use App\Models\Management;
use App\Models\Company;
use App\Models\Area;
use App\Models\Project;
use App\Models\Site;
use App\Models\SubWork;
use App\Models\RequestBuy;
use App\Models\OrderBuy;
use App\Models\Act;
use App\Models\Lot;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        
        // carga de la tabla tipo_estados
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE01';
        $model->name = 'Activo';
        $model->color = '#198754';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE02';
        $model->name = 'Inactivo';
        $model->color = '#6c757d';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE03';
        $model->name = 'Pendiente';
        $model->color = '#0dcaf0';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE04';
        $model->name = 'Observado';
        $model->color = '#6c757d';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE05';
        $model->name = 'Rechazado';
        $model->color = '#dc3545';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE06';
        $model->name = 'Liberado';
        $model->color = '#198754';
        $model->data = [];
        $model->save();
        $model = new StateType();
        $model->state_type_id = 1;
        $model->code = 'TE07';
        $model->name = 'Procesado';
        $model->color = '#000000';
        $model->data = [];
        $model->save();

        // carga de la tabla tipo_monedas
        $model = new CurrencyType();
        $model->state_type_id = 1;
        $model->code = 'PEN';
        $model->name = 'Soles';
        $model->symbol = 'S/.';
        $model->data = [];
        $model->save();
        $model = new CurrencyType();
        $model->state_type_id = 1;
        $model->code = 'USD';
        $model->name = 'Dólares';
        $model->symbol = '$/.';
        $model->data = [];
        $model->save();

        // carga de la tabla unidad_medidas
        $model = new UnitMeasure();
        $model->state_type_id = 1;
        $model->code = 'NIU';
        $model->name = 'Unidad (Bienes)';
        $model->symbol = 'NIU';
        $model->data = [];
        $model->save();
        $model = new UnitMeasure();
        $model->state_type_id = 1;
        $model->code = 'ZZ';
        $model->name = 'Unidad (Servicios)';
        $model->symbol = 'ZZ';
        $model->data = [];
        $model->save();
        
        // carga de la tabla Sites
        $model = new Site();
        $model->state_type_id = 1;
        $model->code = 'S01';
        $model->name = 'Site 1';
        $model->data = [];
        $model->save();
        $model = new Site();
        $model->state_type_id = 1;
        $model->code = 'S02';
        $model->name = 'Site 2';
        $model->data = [];
        $model->save();
        $model = new Site();
        $model->state_type_id = 1;
        $model->code = 'S03';
        $model->name = 'Site 3';
        $model->data = [];
        $model->save();
        $model = new Site();
        $model->state_type_id = 1;
        $model->code = 'S04';
        $model->name = 'Site 4';
        $model->data = [];
        $model->save();
        $model = new Site();
        $model->state_type_id = 1;
        $model->code = 'S05';
        $model->name = 'Site 5';
        $model->data = [];
        $model->save();

        // carga de la tabla Managements
        $model = new Management();
        $model->state_type_id = 1;
        $model->code = 'G01';
        $model->name = 'Fija';
        $model->data = [];
        $model->save();
        $model = new Management();
        $model->state_type_id = 1;
        $model->code = 'G02';
        $model->name = 'Móvil';
        $model->data = [];
        $model->save();
        
        // carga de la tabla areas
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A01';
        $model->name = 'Fibra Óptica';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A02';
        $model->name = 'Implementación';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A03';
        $model->name = 'FTTH';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A04';
        $model->name = 'Ingeniería';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A05';
        $model->name = 'Búsqueda';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A06';
        $model->name = 'Obra Civiles';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A07';
        $model->name = 'Coubicación';
        $model->data = [];
        $model->save();
        $model = new Area();
        $model->state_type_id = 1;
        $model->code = 'A08';
        $model->name = 'Altas usuarios';
        $model->data = [];
        $model->save();
        
        // carga de la tabla tipo_documento
        $model = new DocumentType();
        $model->country_id = 1;
        $model->state_type_id = 1;
        $model->code = '1';
        $model->name = 'DNI';
        $model->data = [];
        $model->save();
        $model = new DocumentType();
        $model->country_id = 1;
        $model->state_type_id = 1;
        $model->code = '6';
        $model->name = 'RUC';
        $model->data = [];
        $model->save();

        // carga de la tabla tipo_vouchers
        $model = new VoucherType();
        $model->country_id = 1;
        $model->state_type_id = 1;
        $model->code = '01';
        $model->name = 'Factura';
        $model->data = [];
        $model->save();

        // carga de la tabla Companys
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E01';
        $model->name = 'Claro';
        $model->managements = [
            ["state_type_id"=>1,"management_id"=>1],
            ["state_type_id"=>1,"management_id"=>2]
        ];
        $model->areas = [
            ["state_type_id"=>1,"area_id"=>1],
            ["state_type_id"=>1,"area_id"=>2]
        ];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección Claro"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E02';
        $model->name = 'Entel';
        $model->managements = [
            ["state_type_id"=>1,"management_id"=>1],
            ["state_type_id"=>1,"management_id"=>2]
        ];
        $model->areas = [
            ["state_type_id"=>1,"area_id"=>2],
            ["state_type_id"=>1,"area_id"=>3]
        ];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección Entel"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E03';
        $model->name = 'LPS';
        $model->managements = [
            ["state_type_id"=>1,"management_id"=>1],
            ["state_type_id"=>1,"management_id"=>2]
        ];
        $model->areas = [
            ["state_type_id"=>1,"area_id"=>4],
            ["state_type_id"=>1,"area_id"=>5]
        ];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección LPS"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E04';
        $model->name = 'WOW';
        $model->managements = [
            ["state_type_id"=>1,"management_id"=>1]
        ];
        $model->areas = [
            ["state_type_id"=>1,"area_id"=>6]
        ];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección WoW"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E05';
        $model->name = 'Gilat';
        $model->managements = [
            ["state_type_id"=>1,"management_id"=>1]
        ];
        $model->areas = [
            ["state_type_id"=>1,"area_id"=>7]
        ];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección Gilat"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E06';
        $model->name = 'company 1';
        $model->managements = [];
        $model->areas = [];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección company 1"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E07';
        $model->name = 'company 2';
        $model->managements = [];
        $model->areas = [];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección company 2"]
        ];
        $model->data = [];
        $model->save();
        $model = new Company();
        $model->document_type_id = 2;
        $model->state_type_id = 1;
        $model->code = 'E08';
        $model->name = 'company 3';
        $model->managements = [];
        $model->areas = [];
        $model->sites = [
            ["state_type_id"=>1,"site"=>"Dirección company 3"]
        ];
        $model->data = [];
        $model->save();
        
        // carga de la tabla Projects
        $model = new Project();
        $model->company_id = 1;
        $model->state_type_id = 1;
        $model->code = 'F9060642';
        $model->name = 'Minoristas';
        $model->data = [];
        $model->save();
        $model = new Project();
        $model->company_id = 2;
        $model->state_type_id = 1;
        $model->code = 'F9060641';
        $model->name = 'Mayoristas';
        $model->data = [];
        $model->save();
        
        // carga de la tabla sub_obras
        $model = new SubWork();
        $model->project_id = 1;
        $model->area_id = 1;// la Company Claro tiene estas áreas = $model->areas = '[{"area_id":1,"state_type_id":1},{"area_id":2,"state_type_id":1}]';
        $model->state_type_id = 1;
        $model->code = 'SO01';
        $model->name = 'Sub obra 1 - Project 1';// el name de la sub obra será el campo-name de la tabla Site
        $model->data = [];
        $model->save();
        $model = new SubWork();
        $model->project_id = 1;
        $model->area_id = 2;
        $model->state_type_id = 1;
        $model->code = 'SO02';
        $model->name = 'Sub obra 2 - Project 1';
        $model->data = [];
        $model->save();
        $model = new SubWork();
        $model->project_id = 2;
        $model->area_id = 2;// la Company Entel tiene estas áreas = $model->areas = '[{"area_id":1,"state_type_id":1},{"area_id":2,"state_type_id":1}]';
        $model->state_type_id = 1;
        $model->code = 'SO03';
        $model->name = 'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)';
        $model->data = [];
        $model->save();

        // carga de la tabla solicitud_compras
        $model = new RequestBuy();
        $model->company_id = 6;//proveedor (Empresa)
        $model->user_id = 4;//encargado (usuario project manager)
        $model->currency_type_id = 1;
        $model->state_type_id = 1;
        $model->code = 'SC01';
        $model->name = 'Solicitud de compra 1';
        $model->payment_method = 'Transferencia';
        $model->payment_term = '15 días';
        $model->detail = [
            ['state_type_id'=>1,'sub_work_id'=>1,'unit_measure_id'=>1,'description'=>'description 1','price'=>100,'amount'=>1],
            ['state_type_id'=>1,'sub_work_id'=>2,'unit_measure_id'=>1,'description'=>'description 2','price'=>200,'amount'=>1]
        ];
        $model->data = [];
        $model->save();
        $model = new RequestBuy();
        $model->company_id = 8;
        $model->user_id = 5;
        $model->currency_type_id = 1;
        $model->state_type_id = 1;
        $model->code = 'SC01';
        $model->name = 'Solicitud de compra 2';
        $model->payment_method = 'Transferencia';
        $model->payment_term = '7 días';
        $model->detail = [
            ['state_type_id'=>1,'sub_work_id'=>3,'unit_measure_id'=>1,'description'=>'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)','price'=>300,'amount'=>1]
        ];
        $model->data = [];
        $model->save();
        
        // carga de la tabla orden_compras
        $model = new OrderBuy();
        $model->request_buy_id = 1;
        $model->state_type_id = 7;
        $model->code = '906.0520.60409.22';
        $model->name = 'Orden de compra 1';
        $model->detail = [
            ['state_type_id'=>1,'description'=>'description 1','price'=>100,'amount'=>1],
            ['state_type_id'=>1,'description'=>'description 2','price'=>200,'amount'=>1]
        ];
        // $model->firms = [
        //     ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00']
        // ];//action A = APROBADO, O = OBSERVADO, R = RECHAZADO, V = VISTO // EL user_id será del usuario GERENTE DE TELECOMUNICACIONES (Erick)
        $model->files = [
            ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/orden_compra/906.0520.60409.22/906.0520.60409.22.pdf']
        ];
        $model->data = [];
        $model->save();
        $model = new OrderBuy();
        $model->request_buy_id = 2;
        $model->state_type_id = 7;
        $model->code = '906.0620.60409.22';
        $model->name = 'Orden de compra 2';
        $model->detail = [
            ['state_type_id'=>1,'unit_measure_id'=>1,'description'=>'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)','price'=>1000,'amount'=>1]
        ];
        // $model->firms = [
        //     ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00']
        // ];
        $model->files = [
            ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/orden_compra/906.0620.60409.22/906.0620.60409.22.pdf']
        ];
        $model->data = [];
        $model->save();
                
        // carga de la tabla Acts
        $model = new Act();
        $model->order_buy_id = 1;
        $model->state_type_id = 7;
        $model->code = 'A001';
        $model->name = 'Act 1';
        $model->detail = [
            ['state_type_id'=>1,'detail_order_buy_id'=>0,'amount'=>0.5],
            ['state_type_id'=>1,'detail_order_buy_id'=>1,'amount'=>0.5]
        ];
        $model->files = [
            ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/Act/A001/A001.pdf']
        ];
        $model->firms = [
            ['user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
            ['user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
            ['user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
            ['user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
        ];//El primero en validar es el usuario user de la solicitud de compra(P.M), segundo será el usuario Management, tercero el usuario GERENTE DE TELECOMUNICACIONES y tercero el GERENTE GENERAL        
        $model->voucher = [
            ['state_type_id'=>7,
            'voucher_type_id'=>1,
            'currency_type_id'=>1,
            'bool_selected'=>1,// si ha sido seleccionado o no en un lote
            'serie'=>'0E001',
            'correlative'=>'000001',
            'date_issue'=>'2022-10-23',
            'bool_tax'=>1,//si tiene igv o no.
            'detraction'=>0.12,
            'amount'=>150,//amount total de detail de Act
            'total_voucher'=>177,// amount + (amount * 0.18)
            'detraction_amount'=>18, // total_voucher * detraction
            'net'=>155.76, // total_voucher - detraction_monto
            'files'=> [
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E001-000001/0E001-000001.xml'],
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E001-000001/0E001-000001.pdf']
            ],
            'firms'=>[
                ['state_type_id'=>1,'user_id'=>8,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 10:00:00'],
                ['state_type_id'=>1,'user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
                ['state_type_id'=>1,'user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
                ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
                ['state_type_id'=>1,'user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
            ]]
        ];
        $model->data = [];
        $model->save();

        $model = new Act();
        $model->order_buy_id = 1;
        $model->state_type_id = 7;
        $model->code = 'A002';
        $model->name = 'Act 2';
        $model->detail = [
            ['state_type_id'=>1,'detail_order_buy_id'=>0,'amount'=>0.5],
            ['state_type_id'=>1,'detail_order_buy_id'=>0,'amount'=>0.5]
        ];
        $model->files = [
            ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/Act/A002/A002.pdf']
        ];
        $model->firms = [
            ['user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
            ['user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
            ['user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
            ['user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
        ];//El primero en validar es el usuario user de la solicitud de compra(P.M), segundo será el usuario Management, tercero el usuario GERENTE DE TELECOMUNICACIONES y tercero el GERENTE GENERAL        
        $model->voucher = [
            ['state_type_id'=>7,
            'voucher_type_id'=>1,
            'currency_type_id'=>1,
            'bool_selected'=>1,
            'serie'=>'0E002',
            'correlative'=>'000002',
            'date_issue'=>'2022-10-23',
            'bool_tax'=>1,
            'detraction'=>0.12,
            'amount'=>150,//amount total de detail de Act
            'total_voucher'=>177,// amount + (amount * 0.18)
            'detraction_monto'=>18, // total_voucher * detraction
            'net'=>155.76, // total_voucher - detraction_monto
            'files'=> [
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E002-000002/0E002-000002.xml'],
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E002-000002/0E002-000002.pdf']
            ],
            'firms'=>[
                ['state_type_id'=>1,'user_id'=>8,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 10:00:00'],
                ['state_type_id'=>1,'user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
                ['state_type_id'=>1,'user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
                ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
                ['state_type_id'=>1,'user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
            ]]
        ];
        $model->data = [];
        $model->save();
        $model = new Act();
        $model->order_buy_id = 2;
        $model->state_type_id = 7;
        $model->code = 'A003';
        $model->name = 'Act 3';
        $model->detail = [
            ['state_type_id'=>1,'detail_order_buy_id'=>0,'amount'=>1]
        ];
        $model->files = [
            ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/Act/A003/A003.pdf']
        ];
        $model->firms = [
            ['user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
            ['user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
            ['user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
            ['user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
        ];//El primero en validar es el usuario user de la solicitud de compra(P.M), segundo será el usuario Management, tercero el usuario GERENTE DE TELECOMUNICACIONES y tercero el GERENTE GENERAL        
        $model->voucher = [
            ['state_type_id'=>7,
            'voucher_type_id'=>1,
            'currency_type_id'=>1,
            'bool_selected'=>1,
            'serie'=>'0E003',
            'correlative'=>'000003',
            'date_issue'=>'2022-10-23',
            'bool_tax'=>1,
            'detraction'=>0.12,
            'amount'=>300,//amount total de detail de Act
            'total_voucher'=>354,// amount + (amount * 0.18)
            'detraction_monto'=>42.48, // total_voucher * detraction
            'net'=>311.52, // total_voucher - detraction_monto
            'files'=> [
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E003-000003/0E003-000003.xml'],
                ['state_type_id'=>1,'src'=>'../documentos/2022/OCTUBRE/voucher/0E003-000003/0E003-000003.pdf']
            ],
            'firms'=>[
                ['state_type_id'=>1,'user_id'=>8,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 10:00:00'],
                ['state_type_id'=>1,'user_id'=>4,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 12:00:00'],
                ['state_type_id'=>1,'user_id'=>2,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 14:00:00'],
                ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
                ['state_type_id'=>1,'user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
            ]]
        ];
        $model->data = [];
        $model->save();
        
        // carga de la tabla Lots
        $model = new Lot();
        $model->state_type_id = 7;
        $model->code = 'L001';
        $model->name = 'Lot 1';
        $model->detail = [
            ['state_type_id'=>7,'act_id'=>1,'detail_voucher_id'=>0],
            ['state_type_id'=>7,'act_id'=>2,'detail_voucher_id'=>0]
        ];
        $model->firms = [
            ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
            ['state_type_id'=>1,'user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00'],
            ['state_type_id'=>1,'user_id'=>8,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
        ];//El primero en registrar es el usuario GERENTE DE TELECOMUNICACIONES, segundo el GERENTE GENERAL y tercero el usuario CONTADOR     
        $model->data = [];
        $model->save();
        $model = new Lot();
        $model->state_type_id = 7;
        $model->code = 'L002';
        $model->name = 'Lot 2';
        $model->detail = [
            ['state_type_id'=>7,'act_id'=>3,'detail_voucher_id'=>0]
        ];
        $model->firms = [
            ['state_type_id'=>1,'user_id'=>6,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 16:00:00'],
            ['state_type_id'=>1,'user_id'=>7,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00'],
            ['state_type_id'=>1,'user_id'=>8,'action'=>'A','comment'=>'O.K.','fecha'=>'2022-10-23 18:00:00']
        ];//El primero en registrar es el usuario GERENTE DE TELECOMUNICACIONES, segundo el GERENTE GENERAL y tercero el usuario CONTADOR     
        $model->data = [];
        $model->save();
    }
}
