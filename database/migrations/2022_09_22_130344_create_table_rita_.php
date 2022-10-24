<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rita', function (Blueprint $table) {
            $table->id();
            $table->string('radicado',40)->comment("Numero de radicado Unico");
            $table->string('tipo_solicitud',50)->comment("tipo de solicitud(anonima,identificada)");
            $table->string('tipo_persona', 20)->comment("Tipo de persona(NATURAL,JURIDICO)");
            $table->string('tipo_doc', 20)->comment("Tipo de documento de identidad");
            $table->string('identificacion', 40)->comment("Numero de documento de identidad");
            $table->string('nombres', 15)->comment("Nombres solicitud")->nullable();
            $table->string('apellidos', 40)->comment("Apellidos solicitud")->nullable();
            $table->string('razon_social', 40)->comment("Razon social")->nullable();
            $table->string('asunto', 255)->comment("Asunto de solicitud");
            $table->string('telefono_movil', 15)->comment("Telefono Movil")->nullable();
            $table->string('telefono_fijo', 10)->comment("Telefono Fijo")->nullable();
            $table->string('direccion', 140)->comment("Direccion")->nullable();
            $table->string('barrio', 100)->comment("Nombre Barrio")->nullable();
            $table->string('email_solicitante', 60)->comment("Email Solicitante")->nullable();
            $table->string('pais', 80)->comment("Pais de residencia")->nullable();
            $table->string('departamento', 10)->comment("Id departamento")->nullable();
            $table->string('municipio', 60)->comment('Municipio')->nullable();
            $table->string('medio_respuesta', 60)->comment('Medio de respuesta escogido')->nullable();
            $table->text('lugar_denuncia')->comment('Lugar de donde ocurrio la denuncia')->nullable();
            $table->text('cuando_denuncia')->comment('Cuando Ocurrio la denuncia')->nullable();
            $table->text('involucrados_denuncia')->comment('Quienes estan involucrados (puede identificar la entidad, secretaria u oficina o posibles funcionarios responsables)')->nullable();
            $table->text('descripcion_hechos')->comment('Descripcion de los hechos Campo abierto para describir las circunstancias de modo, tiempo y lugar')->nullable();
            $table->string('adj_descripcion',500)->comment('Ruta de documento de dcoumento de descripcion')->nullable();
            $table->text('riesgo_denuncia')->comment('Existe algún riesgo para usted o para los demás')->nullable();
            $table->string('proceso_seleccion',5)->comment('si o no es en un proceso de seleccion o estatal')->nullable();
            $table->text('tipo_contrato')->comment('mínima cuantía, licitación pública, selección abreviada de menor cuantía, selección abreviada subasta inversa, concurso de mérito')->nullable();
            $table->text('informacion_contrato')->comment('información que permita identificar el proceso de selección o el contrato')->nullable();
            $table->string('adj_informacion',500)->comment('Ruta de adjunto de informacion')->nullable();
            $table->date('fecha_aprox_proceso')->comment('Fechas aproximadas del proceso de contratación objeto de denuncia o queja o fechas de suscripción o ejecución del contrato de denuncia')->nullable();
            $table->string('lugar_contrato',80)->comment('Lugar del contrato')->nullable();
            $table->string('entidad_contrato',80)->comment('Entidad donde se realiza el contrato')->nullable();
            $table->text('link_contrato')->comment('Si tiene conocimiento anexar el link del secop II o referencia del proceso. (alfanumerico)')->nullable();
            $table->string('denuncia_anterior',80)->comment('¿Ha denunciado con anterioridad? ¿Ante quién?  (entes de control, alcaldía, gobernación')->nullable();
            $table->string('otra_entidad',80)->comment('otra entidad donde ha denunciado')->nullable();
            $table->text('impacta_organizacion')->comment('Cómo impacta a la organización desde su punto de vista')->nullable();
            $table->string('contacto_adicional',100)->comment('contacto adicional donde se pueda contactar')->nullable();
            $table->string('disuadirlo',5)->comment('Lo han intentado disuadir')->nullable();
            $table->string('quien_disuade',100)->comment('quien lo ha intentado disuadir')->nullable();
            $table->date('fecha_limite')->comment('fecha limite de respuesta')->nullable();
            $table->enum('estado_solicitud',['RADICADA','PENDIENTE','ACTUALIZADA','CONTESTADA','REMITIDA POR COMPETENCIA','NO CONTESTADA'])->comment('Estado de la solicitud');
            $table->text('observaciones_solicitud')->comment('Observaciones de la solicitud')->nullable();
            $table->date('fecha_actuacion')->comment('Fecha para solicitudes en estado pendiente')->nullable();
            $table->string('tratamiento_datos', 5)->comment('Verificacion de tratamiento de datos personales');
            $table->string('acepto_terminos', 5)->comment("Acepta Terminos y condiciones");
            $table->string("confirmo_mayorEdad", 5)->comment("Confirma que es Mayor de edad, y esta diciendo informacion veraz");
            $table->string("compartir_informacion",5)->comment("Acepta Compartir Informacion con otras ent");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rita');
    }
}
