<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\TipoEstado;
use App\Models\TipoDocumento;
use App\Models\TipoMoneda;
use App\Models\unidadMedida;
use App\Models\Gerencia;
use App\Models\Empresa;
use App\Models\Area;
use App\Models\Proyecto;
use App\Models\Sitio;
use App\Models\SubObra;
use App\Models\SolicitudCompra;
use App\Models\OrdenCompra;
use App\Models\Acta;

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
        $model = new TipoEstado();
        $model->tipoEstado_id = 1;
        $model->cod = 'TE01';
        $model->nombre = 'Activo';
        $model->color = '#198754';
        $model->datos = [];
        $model->save();
        $model = new TipoEstado();
        $model->tipoEstado_id = 1;
        $model->cod = 'TE02';
        $model->nombre = 'Inactivo';
        $model->color = '#6c757d';
        $model->datos = [];
        $model->save();
        $model = new TipoEstado();
        $model->tipoEstado_id = 1;
        $model->cod = 'TE03';
        $model->nombre = 'Pendiente';
        $model->color = '#0dcaf0';
        $model->datos = [];
        $model->save();
        $model = new TipoEstado();
        $model->tipoEstado_id = 1;
        $model->cod = 'TE04';
        $model->nombre = 'Procesado';
        $model->color = '#0dcaf0';
        $model->datos = [];
        $model->save();

        // carga de la tabla tipo_monedas
        $model = new TipoMoneda();
        $model->tipoEstado_id = 1;
        $model->cod = 'PEN';
        $model->nombre = 'Soles';
        $model->simbolo = 'S/.';
        $model->datos = [];
        $model->save();
        $model = new TipoMoneda();
        $model->tipoEstado_id = 1;
        $model->cod = 'USD';
        $model->nombre = 'Dólares';
        $model->simbolo = '$/.';
        $model->datos = [];
        $model->save();

        // carga de la tabla unidad_medidas
        $model = new UnidadMedida();
        $model->tipoEstado_id = 1;
        $model->cod = 'NIU';
        $model->nombre = 'Unidad (Bienes)';
        $model->simbolo = 'NIU';
        $model->datos = [];
        $model->save();
        $model = new TipoMoneda();
        $model->tipoEstado_id = 1;
        $model->cod = 'ZZ';
        $model->nombre = 'Unidad (Servicios)';
        $model->simbolo = 'ZZ';
        $model->datos = [];
        $model->save();
        
        // carga de la tabla sitios
        $model = new Sitio();
        $model->tipoEstado_id = 1;
        $model->cod = 'S01';
        $model->nombre = 'Sitio 1';
        $model->datos = [];
        $model->save();
        $model = new Sitio();
        $model->tipoEstado_id = 1;
        $model->cod = 'S02';
        $model->nombre = 'Sitio 2';
        $model->datos = [];
        $model->save();
        $model = new Sitio();
        $model->tipoEstado_id = 1;
        $model->cod = 'S03';
        $model->nombre = 'Sitio 3';
        $model->datos = [];
        $model->save();
        $model = new Sitio();
        $model->tipoEstado_id = 1;
        $model->cod = 'S04';
        $model->nombre = 'Sitio 4';
        $model->datos = [];
        $model->save();
        $model = new Sitio();
        $model->tipoEstado_id = 1;
        $model->cod = 'S05';
        $model->nombre = 'Sitio 5';
        $model->datos = [];
        $model->save();

        // carga de la tabla gerencias
        $model = new Gerencia();
        $model->tipoEstado_id = 1;
        $model->cod = 'G01';
        $model->nombre = 'Fija';
        $model->datos = [];
        $model->save();
        $model = new Gerencia();
        $model->tipoEstado_id = 1;
        $model->cod = 'G02';
        $model->nombre = 'Móvil';
        $model->datos = [];
        $model->save();
        
        // carga de la tabla areas
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A01';
        $model->nombre = 'Fibra Óptica';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A02';
        $model->nombre = 'Implementación';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A03';
        $model->nombre = 'FTTH';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A04';
        $model->nombre = 'Ingeniería';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A05';
        $model->nombre = 'Búsqueda';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A06';
        $model->nombre = 'Obra Civiles';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A07';
        $model->nombre = 'Coubicación';
        $model->datos = [];
        $model->save();
        $model = new Area();
        $model->tipoEstado_id = 1;
        $model->cod = 'A08';
        $model->nombre = 'Altas usuarios';
        $model->datos = [];
        $model->save();
        
        // carga de la tabla tipo_documento
        $model = new TipoDocumento();
        $model->pais_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = '1';
        $model->nombre = 'DNI';
        $model->datos = [];
        $model->save();
        $model = new TipoDocumento();
        $model->pais_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = '6';
        $model->nombre = 'RUC';
        $model->datos = [];
        $model->save();

        // carga de la tabla empresas
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E01';
        $model->nombre = 'Claro';
        $model->gerencias = [
            ["gerencia_id"=>1,"tipoEstado_id"=>1],
            ["gerencia_id"=>2,"tipoEstado_id"=>1]
        ];
        $model->areas = [
            ["area_id"=>1,"tipoEstado_id"=>1],
            ["area_id"=>2,"tipoEstado_id"=>1]
        ];
        $model->sedes = [
            ["direccion"=>"Dirección Claro","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E02';
        $model->nombre = 'Entel';
        $model->gerencias = [
            ["gerencia_id"=>1,"tipoEstado_id"=>1],
            ["gerencia_id"=>2,"tipoEstado_id"=>1]
        ];
        $model->areas = [
            ["area_id"=>2,"tipoEstado_id"=>1],
            ["area_id"=>3,"tipoEstado_id"=>1]
        ];
        $model->sedes = [
            ["direccion"=>"Dirección Entel","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E03';
        $model->nombre = 'LPS';
        $model->gerencias = [
            ["gerencia_id"=>1,"tipoEstado_id"=>1],
            ["gerencia_id"=>2,"tipoEstado_id"=>1]
        ];
        $model->areas = [
            ["area_id"=>4,"tipoEstado_id"=>1],
            ["area_id"=>5,"tipoEstado_id"=>1]
        ];
        $model->sedes = [
            ["direccion"=>"Dirección LPS","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E04';
        $model->nombre = 'WOW';
        $model->gerencias = [
            ["gerencia_id"=>1,"tipoEstado_id"=>1]
        ];
        $model->areas = [
            ["area_id"=>6,"tipoEstado_id"=>1]
        ];
        $model->sedes = [
            ["direccion"=>"Dirección WoW","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E05';
        $model->nombre = 'Gilat';
        $model->gerencias = [
            ["gerencia_id"=>1,"tipoEstado_id"=>1]
        ];
        $model->areas = [
            ["area_id"=>7,"tipoEstado_id"=>1]
        ];
        $model->sedes = [
            ["direccion"=>"Dirección Gilat","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E06';
        $model->nombre = 'Proveedor 1';
        $model->gerencias = [];
        $model->areas = [];
        $model->sedes = [
            ["direccion"=>"Dirección Proveedor 1","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E07';
        $model->nombre = 'Proveedor 2';
        $model->gerencias = [];
        $model->areas = [];
        $model->sedes = [
            ["direccion"=>"Dirección Proveedor 2","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        $model = new Empresa();
        $model->tipoDocumento_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'E08';
        $model->nombre = 'Proveedor 3';
        $model->gerencias = [];
        $model->areas = [];
        $model->sedes = [
            ["direccion"=>"Dirección Proveedor 3","tipoEstado_id"=>1]
        ];
        $model->datos = [];
        $model->save();
        
        // carga de la tabla proyectos
        $model = new Proyecto();
        $model->cliente_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = 'F9060642';
        $model->nombre = 'Minoristas';
        $model->datos = [];
        $model->save();
        $model = new Proyecto();
        $model->cliente_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'F9060641';
        $model->nombre = 'Mayoristas';
        $model->datos = [];
        $model->save();
        
        // carga de la tabla sub_obras
        $model = new SubObra();
        $model->proyecto_id = 1;
        $model->area_id = 1;// la empresa Claro tiene estas áreas = $model->areas = '[{"area_id":1,"tipoEstado_id":1},{"area_id":2,"tipoEstado_id":1}]';
        $model->tipoEstado_id = 1;
        $model->cod = 'SO01';
        $model->nombre = 'Sub obra 1 - Proyecto 1';// el nombre de la sub obra será el campo-nombre de la tabla sitio
        $model->datos = [];
        $model->save();
        $model = new SubObra();
        $model->proyecto_id = 1;
        $model->area_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = 'SO02';
        $model->nombre = 'Sub obra 2 - Proyecto 1';
        $model->datos = [];
        $model->save();
        $model = new SubObra();
        $model->proyecto_id = 2;
        $model->area_id = 2;// la empresa Entel tiene estas áreas = $model->areas = '[{"area_id":1,"tipoEstado_id":1},{"area_id":2,"tipoEstado_id":1}]';
        $model->tipoEstado_id = 1;
        $model->cod = 'SO03';
        $model->nombre = 'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)';
        $model->datos = [];
        $model->save();

        // carga de la tabla solicitud_compras
        $model = new SolicitudCompra();
        $model->proveedor_id = 6;
        $model->encargado_id = 4;
        $model->tipoMoneda_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = 'SC01';
        $model->nombre = 'Solicitud de compra 1';
        $model->formaPago = 'Transferencia';
        $model->terminoPago = '15 días';
        $model->detalle = [
            ['subObra_id'=>1,'unidadMedida_id'=>1,'descripcion'=>'Descripcion 1','precio'=>1999.69,'cantidad'=>5],
            ['subObra_id'=>2,'unidadMedida_id'=>1,'descripcion'=>'Descripcion 2','precio'=>3999.99,'cantidad'=>3]
        ];
        $model->datos = [];
        $model->save();
        $model = new SolicitudCompra();
        $model->proveedor_id = 8;
        $model->encargado_id = 5;
        $model->tipoMoneda_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = 'SC01';
        $model->nombre = 'Solicitud de compra 2';
        $model->formaPago = 'Transferencia';
        $model->terminoPago = '7 días';
        $model->detalle = [
            ['subObra_id'=>3,'unidadMedida_id'=>1,'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)'=>'Descripcion 1','precio'=>9999.99,'cantidad'=>1]
        ];
        $model->datos = [];
        $model->save();
        
        // carga de la tabla orden_compras
        $model = new OrdenCompra();
        $model->solicitudCompra_id = 1;
        $model->tipoEstado_id = 1;
        $model->cod = '906.0520.60409.22';
        $model->nombre = 'Orden de compra 1';
        $model->detalle = [
            ['descripcion'=>'Descripcion 1','precio'=>1999.69,'cantidad'=>1],
            ['descripcion'=>'Descripcion 2','precio'=>3999.99,'cantidad'=>1]
        ];
        $model->firmas = [
            ['user_id'=>6,'accion'=>'A','comentario'=>'O.K.','fecha'=>'2022-10-23 12:00:00']
        ];//ACCION A = APROBADO, O = OBSERVADO, R = RECHAZADO, V = VISTO // EL user_id será del usuario GERENTE DE TELECOMUNICACIONES (Erick)
        $model->archivos = [
            ['tipoEstado_id'=>1,'src'=>'../documentos/2022/NOVIEMBRE/orden_compra/906.0520.60409.22/906.0520.60409.22.pdf']
        ];
        $model->datos = [];
        $model->save();
        $model = new OrdenCompra();
        $model->solicitudCompra_id = 2;
        $model->tipoEstado_id = 1;
        $model->cod = '906.0620.60409.22';
        $model->nombre = 'Solicitud de compra 2';
        $model->detalle = [
            ['subObra_id'=>3,'unidadMedida_id'=>1,'Servicios PEXT_S412772-S412773 || FIBERLUX (Huasao)'=>'Descripcion 1','precio'=>9999.99]
        ];
        $model->firmas = [
            ['user_id'=>6,'accion'=>'A','comentario'=>'O.K.','fecha'=>'2022-10-23 14:00:00']
        ];
        $model->archivos = [
            ['tipoEstado_id'=>1,'src'=>'../documentos/2022/NOVIEMBRE/orden_compra/906.0620.60409.22/906.0620.60409.22.pdf']
        ];
        $model->datos = [];
        $model->save();
    }
}
