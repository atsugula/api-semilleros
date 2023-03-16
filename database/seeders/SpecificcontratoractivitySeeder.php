<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specificcontratoractivity;

class SpecificcontratoractivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specificcontratoractivity::create([
            'name' => 'DIRECTOR ADMINISTRATIVO',
            'description' => '1.Responder por la planeación, organización, dirección y control de los servicios administrativos, sugiriendo las medidas necesarias para mejorar su funcionamiento.
            2.Revisar, autorizar los pagos y control de la ejecución presupuestal.
            3.Coordinar de reuniones de planeación y seguimiento.
            4.Coordinar la gestión de compras y oportunidad en la entrega de suministros.
            5.Realizar la proyección de flujo de caja.
            6.Revisar y aprobar los informes del Proyecto para correspondientes desembolsos y los requeridos por la supervisión del proyecto.
            7.Atender los requerimientos administrativos del contratista del proyecto.
            8.Dirigir las actividades del ingreso del contratista necesario para la ejecución del Proyecto.
            9.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            10.Revisar y aprobar los informes presentados por los contratistas que se encuentran bajo su responsabilidad para la verificación del proceso técnico y de pago y elaborar los correspondientes certificados de supervisión.
            11.Elaborar el informe en el que dé cuenta de sus actividades realizadas.
            12.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'DIRECTOR TÉCNICO',
            'description' => '1.Asegurar el adecuado funcionamiento técnico y social del Proyecto.
            2.Realizar la planeación técnica de las actividades que se desarrollaran en los Municipios.
            3.Diseñar los formato de ejecución del programa a nivel técnico.
            4.Coordinar las reuniones de planeación, seguimiento y control con el equipo técnico del programa.
            5.Diseñar los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos y apoyos para talentos.
            6.Diseñar capacitaciones, talleres técnicos y componentes deportivos del programa.
            7.Dirigir, evaluar y apoyar la labor del contratista a cargo.
            8.Elaborar en la plataforma digital el registro de visitas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros.
            9.Realizar reuniones periódicas con los subdirectores técnicos regionales y coordinadores del proyecto.
            10.Evaluar el cumplimiento de las actividades de los contratistas a cargo y rendir al director administrativo.
            11.Atender los requerimientos técnicos de los coordinadores de las regiones.
            12.Informar oportunamente al Director Administrativo de manera periódica los avances del proyecto, así como cualquier situación que afecte el desarrollo del mismo.
            13.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            14.Elaborar el informe técnico en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades.
            15.Revisar y aprobar los informes presentados por los subdirectores técnicos regionales para la verificación del proceso técnico y de pago y elaborar los correspondientes certificados de supervisión.
            16.Realizar las actividades de monitoreo y seguimiento al desarrollo del Proyecto en campo, dando cumplimiento a los indicadores establecidos.
            17.Elaborar el informe en el que dé cuenta de sus actividades realizadas.
            18.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'DIRECTOR PROGRAMAS TRANSVERSALES',
            'description' => '1.Realizar la planeación de los programas transversales.
            2.Coordinar y liderar los apoyos transversales de las entidades gubernamentales y municipales: Salud, Seguridad con el proyecto.
            3.Coordinar y desarrollar las actividades transversales y hacer seguimiento a la ejecución.
            4.Apoyar en el diseño de las campañas de divulgación para las redes sociales que permitan dar a conocer el proyecto y sus beneficios.
            5.Contribuir con el suministro de imágenes para la videoteca digital que da evidencia de todas las actividades del proyecto.
            6.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            7.Elaborar en la plataforma digital el registro de visitas de eventos de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros.
            8.Elaborar el informe en el que dé cuenta de sus actividades realizadas.
            9.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo. '
        ]);

        Specificcontratoractivity::create([
            'name' => 'SUBDIRECTOR TECNICO REGIONAL',
            'description' => '1.Asegurar el adecuado funcionamiento técnico y social en los Municipios de las regiones que le correspondan.
            2.Dirigir, evaluar y apoyar la labor del contratista a cargo.
            3.Capacitar y orientar a los metodólogos que tenga a cargo.
            4.Realizar reuniones periódicas de planeación, seguimiento y control con los coordinadores Regionales, metodólogos y psicólogos de las regiones que le correspondan.
            5.Coordinar la ejecución de los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos y apoyos para talentos.
            6.Informar oportunamente al director técnico los avances del Proyecto, así como también cualquier situación que afecte el desarrollo del mismo.
            7.Elaborar los informes técnicos en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades y presentar al Director técnico.
            8.Revisar y aprobar los informes presentados por los coordinadores Regionales y Metodólogos de las regiones que le corresponda para la verificación del proceso técnico y validar el pago.
            9.Revisar y aprobar los cronogramas en plataforma presentados por los monitores deportivos de las regiones que le correspondan.
            10.Verificar el cumplimiento de los indicadores de la región.
            11.Evaluar el cumplimiento de las actividades de los contratistas a cargo y rendir al director técnico.
            12.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            13.Realizar las actividades de monitoreo y seguimiento al desarrollo del Proyecto en campo.
            14.Elaborar en la plataforma digital el registro de visitas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros.
            15.Realizar procesos de verificación de la gratuidad del programa en los Municipios y la garantía de derechos de los niños, niñas, adolescentes y jóvenes.
            16.Elaborar el informe en el que dé cuenta de sus actividades realizadas.
            17.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo. '
        ]);

        Specificcontratoractivity::create([
            'name' => 'COORDINADOR PSICOSOCIAL',
            'description' => '1.Diseñar y realizar metodologías de acompañamiento psicosocial en compañía del director técnico para el proyecto.
            2.Brindar herramientas al equipo del Proyecto para fortalecer los procesos de convocatoria, trabajo en red, relación con las familias y dinámica grupal a través de talleres de formación y fortalecimiento del equipo de trabajo.
            3.Realizar la solicitud de los escenarios que se requieren para la ejecución del proyecto.
            4.Sugerir ajustes, mejoras y/o posibles modificaciones que se requieran para el fortalecimiento del trabajo social y la atención psicosocial en el proyecto.
            5.Realizar las pruebas de selección al contratista que se requiere para el desarrollo adecuado del proyecto.
            6.Asistir puntualmente a las capacitaciones, reuniones y convocatorias hechas por la Dirección del proyecto.
            7.Verificar el cumplimiento de las asesorías personalizadas y visitas de seguimiento en campo que realizara el equipo psicosocial a los beneficiarios y padres de familia.
            8.Informar oportunamente al Director Administrativo de manera periódica los avances del proyecto, así como cualquier situación que afecte el desarrollo del mismo.
            9.Elaborar el informe psicosocial en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades y presentar al Director Administrativo.
            10.Revisar y aprobar los informes presentados por los psicólogos para la verificación del proceso psicosocial, y validación del pago.
            11.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            12.Elaborar el informe en el que dé cuenta de sus actividades realizadas.
            13.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo. '
        ]);

        Specificcontratoractivity::create([
            'name' => 'COORDINADOR REGIONAL',
            'description' => '1.Realizar la socialización del proyecto con los alcaldes y líderes sociales, recreativos y deportivos de todos los municipios de la región que le corresponda.
            2.Socializar los avances del proyecto a los alcaldes y líderes sociales, recreativos y deportivos de todos los municipios de la región que le corresponda.
            3.Realizar visitas de seguimiento y control a los monitores deportivos de los municipios que le correspondan.
            4.Realizar reuniones periódicas con el equipo de la región para conocer y orientar el desarrollo del proyecto en campo.
            5.Mantener permanente y buena comunicación con los contratistas de la región que le corresponde.
            6.Apoyar y gestionar la ejecución de los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos y apoyos para talentos.
            7.Coordinar la adecuada realización de las actividades del programa semilleros transversales.
            8.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            9.Elaborar los informes en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades de la región asignada y presentárselos al subdirector técnico regional.
            10.Evaluar el cumplimiento de las actividades de los contratistas a cargo y rendir al subdirector técnico.
            11.Revisar y aprobar los informes presentados por los monitores deportivos para la verificación del proceso técnico y de pago y elaborar los certificados de supervisión.
            12.Elaborar en la plataforma digital el registro de visitas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros establecidos.
            13.Consolidar la base de datos de los escenarios deportivos utilizados por los monitores de su región.
            14.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            15.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'COORDINADOR ZONA MARITIMA',
            'description' => '1.Realizar la socialización del proyecto con líderes sociales, recreativos y deportivos de la zona marítima.
            2.Coordinar la logística de encuentros, eventos y festivales deportivos en la zona marítima.
            3.Elaborar en la plataforma digital el registro de visitas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros establecidos.
            4.Apoyar y gestionar la ejecución de los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos y apoyos para talentos.
            5.Coordinar la adecuada realización de las actividades del programa semilleros transversales.
            6.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            7.Realizar visitas de seguimiento y control a los monitores deportivos asignados.
            8.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            9.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'PSICOLOGOS',
            'description' => '1.Orientar adecuadamente a los coordinadores, metodólogos y monitores deportivos frente al manejo psicosocial de los niños y jóvenes pertenecientes al programa y que permitan fortalecer el desarrollo humano y social, de acuerdo a las directrices dadas por la coordinación psicosocial.
            2.Realizar las pruebas de selección al contratista que se requiere para el desarrollo adecuado del proyecto.
            3.Asistir puntualmente a las capacitaciones, reuniones y convocatorias hechas por la Dirección del proyecto.
            4.Realizar las asesorías personalizadas a los beneficiarios y padres de familia, para atender los casos puntuales de niños que requieran tratamiento y que sean informados por los monitores deportivos o metodólogos.
            5.Realizar conferencias a semilleros de familia de cada municipio, de acuerdo a los indicadores establecidos, y realizar acta de re reunión con registro fotográfico y listas de asistencia.
            6.Realizar conferencias al equipo de trabajo para la promoción de valores sociales y realizar acta de re reunión con registro fotográfico y listas de asistencia.
            7.Orientar al equipo técnico en herramientas lúdico creativas para el desarrollo de los semilleros transversales con los beneficiarios.
            8.Informar oportunamente al coordinador psicosocial de manera periódica los avances del proyecto en la región asignada, así como cualquier situación que afecte el desarrollo del mismo.
            9.Evaluar el cumplimiento de las actividades psicosociales y transversales de los monitores asignados en la región y rendir al coordinador psicosocial.
            10.Recibir orientación para la organización y desarrollo de programas transversales y registrar en la plataforma las actividades desarrolladas.
            11.Apoyar psicosocialmente la ejecución de los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos.
            12.Elaborar en la plataforma digital el registro de visitas y asesorías personalizadas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros establecidos.
            13.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            14.Elaborar el informe psicosocial consolidado en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades.
            15.Elaborar el informe de las actividades realizadas.
            16.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'METODÓLOGO',
            'description' => '1.Realizar capacitaciones técnicas a los monitores deportivos de sus municipios, brindándoles herramientas pedagógicas para el desarrollo físico y motriz de los beneficiarios, apoyándose en una metodología lúdica creativa que garantice el bienestar y permanencia de los beneficiarios en el proyecto.
            2.Desarrollar de forma virtual los talleres técnicos de la modalidad deportiva que les corresponda.
            3.Revisar y aprobar las fichas de inscripción y de tamizaje en plataforma digital de los beneficiarios de los monitores a cargo.
            4.Realizar seguimiento y retroalimentación al trabajo de los monitores deportivos durante las sesiones prácticas, dando cumplimiento a los indicadores establecidos.
            5.Elaborar en la plataforma digital el registro de visitas en campo de acuerdo a los indicadores establecidos, dejando constancia de su visita con el registro fotográfico de acuerdo a parámetros establecidos.
            6.Elaborar con el equipo de trabajo metodológico los planes clase por modalidad deportiva asignada e instruir a los monitores en su aplicación.
            7.Desarrollar la ejecución de los proyectos deportivos como mundialitos, eventos, encuentros, festivales deportivos y apoyos para talentos.
            8.Entregar al coordinador la base de datos de los escenarios deportivos utilizados por los monitores a su cargo.
            9.Evaluar el cumplimiento de las actividades técnicas de los monitores asignados en la región y rendir al subdirector técnico.
            10.Elaborar el informe técnico donde rinda los procesos metodológicos desarrollados por los monitores y beneficiarios en temas como:  aplicación de las metodologías de trabajo, modalidades deportivas, desarrollo de componentes, participación en eventos, mundialitos, encuentros y festivales deportivos, y reporte de talentos deportivos.
            11.Evaluar periódicamente el cumplimiento de la cobertura de los beneficiarios de los monitores deportivos.
            12.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            13.Garantizar los derechos de los niños, niñas, adolescentes y jóvenes, en el ámbito social, mental, físico y moral, de acuerdo la normativa colombiana.
            14.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            15.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que corresponda a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'MONITOR DEPORTIVO',
            'description' => '1.Apoyar y fortalecer el proceso de vinculación de las niñas, niños, adolescentes y jóvenes al proyecto, por medio de socializaciones en colegios, parques o espacios donde se encuentre la población.
            2.Diligenciar las fichas de inscripción y tamizaje de los beneficiarios de acuerdo al indicador por disciplina deportiva, y reportar el retiro de los beneficiarios y el ingreso de beneficiarios de remplazo durante la ejecución del contrato, si aplica.
            3.Implementar las orientaciones técnicas recibidas por parte del metodólogo como estrategia de fortalecimiento de los procesos de enseñanza - aprendizaje, para brindar un proceso de calidad.
            4.Realizar la práctica deportiva con los beneficiarios de acuerdo a los contenidos establecidos en el plan clase entregado por el equipo técnico, sobre la disciplina a su cargo.
            5.Mantener permanente y buena comunicación con el equipo del proyecto, los padres de familia, los líderes deportivos y sociales y los beneficiarios.
            6.Implementar con sus beneficiarios las actividades del programa semilleros transversales en compañía de las psicólogas, metodólogos y coordinadores de la región.
            7.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            8.Elaborar y presentar el informe sobre los avances y el desarrollo del proceso en virtuales y/o presenciales según las orientaciones dadas por el equipo técnico del proyecto y presentar al metodólogo para su aprobación.
            9.Elaborar el cronograma de prácticas deportivas y realizar actualizaciones si aplica.
            10.Realizar la convocatoria a padres o acudientes para el desarrollo de los semilleros de familia y asesorías personalizadas que lideran las psicólogas.
            11.Garantizar los derechos de los niños, niñas, adolescentes y jóvenes, en el ámbito social, mental, físico y moral, de acuerdo la normativa colombiana.
            12.Garantizar la gratuidad del programa en los Municipios y su enfoque diferencial.
            13.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            14.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'CONTADOR GENERAL',
            'description' => '1.Garantizar que la información se esté procesando de acuerdo con los principios de contabilidad legalmente aceptados en Colombia.
            2.Entregar la ejecución presupuestal del proyecto a la Dirección Administrativa de acuerdo a los movimientos contables que se hayan ejecutado.
            3.Elaborar los informes financieros para la rendición de cuentas a la entidad contratante.
            4.Revisar, organizar y controlar la información que se genere de las actividades contables.
            5.Entregar original y copia de las facturas y documentos equivalentes para soportar los informes financieros.
            6.Realizar el registro de los documentos en el programa contable.
            7.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            8.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            9.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'APOYO JURIDICO',
            'description' => '1.Validar los antecedentes del personal a vincular, de acuerdo a requerimientos de contratación.
            2.Revisar la documentación precontractual de la personas naturales y jurídicas.
            3.Manejar la base de datos de todo el personal vinculado al programa.
            4.Elaborar procesos contractuales como otrosi, suspensiones, modificaciones, adiciones, prorrogas, actas de terminación anticipadas y liquidación de contratos.
            5.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            6.Elaborar el informe en el que dé cuenta de las actividades realizadas.
            7.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'ASISTENTE ADMINISTRATIVO',
            'description' => '1.Apoyar adecuadamente al Director Administrativo del proyecto frente a las actividades administrativas que le asean asignadas.
            2.Apoyar en la recolección de información para la elaboración del informe administrativo, técnico y financiero para la rendición de cuentas a la entidad contratante.
            3.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            4.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.
            5.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo,'
        ]);

        Specificcontratoractivity::create([
            'name' => 'APOYO ADMINISTRATIVO',
            'description' => '1.Recibir las fichas de inscripción diligenciadas de los beneficiarios del proyecto y emitir las estadísticas requeridas.
            2.Diligenciar la información para el registro de beneficiarios a la aseguradora.
            3.Responder por la base de datos digital y el registro físico de los beneficiarios.
            4.Llevar un adecuado archivo de las fichas de inscripción física del proyecto.
            5.Realizar la consolidación de los soportes que requiera el equipo técnico del proyecto.
            6.Apoyar el proceso de afiliación a la ARL de los contratistas el programa.
            7.Manejar la plataforma del Drive en donde reposa los informes del contratista del proyecto.
            8.Realizar seguimiento y control del resultado de la cobertura del proyecto e informar su comportamiento al equipo directivo.
            9.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            10.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.
            11.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'PERIODISTA',
            'description' => '1.Organizar y coordinar las piezas de difusión para medios de comunicación.
            2.Buscar la información relevante en las regiones para divulgar en redes sociales.
            3.Cubrir eventos, capacitaciones, conferencias, reuniones y festivales para redactar las crónicas en medios de comunicación.
            4.Gestionar alianzas con medios de comunicación para la divulgación de programa.
            5.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            6.Realizar el informe de estadísticas de redes sociales y piezas o historias divulgadas.
            7.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.
            8.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'PERIODISTA DE APOYO',
            'description' => '1.Organizar y coordinar las piezas para difusión en medios de divulgación.
            2.Buscar la información relevante en las regiones para divulgar en redes sociales.
            3.Cubrir eventos como festivales para redactar las crónicas en medios de comunicación.
            4.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            5.Gestionar alianzas con medios de comunicación para la divulgación de programa.
            6.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.
            7.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas por el director Administrativo y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'AUXILIAR ADMINISTRATIVO Y TECNICO',
            'description' => '1.Solicitar y organizar los documentos para la contratación del personal de la región o área asignada.
            2.Realizar convocatoria de contratistas a reuniones según la región o área que le corresponda.
            3.Dar respuesta de manera oportuna a las solicitudes realizadas por los contratistas del Proyecto según la región y el área que le corresponda.
            4.Participar de reuniones de planificación y seguimiento administrativo.
            5.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.
            6.Validar la información administrativa del contratista de la región que le corresponda, revisar su contenido verificando que se encuentre actualizado conforme a la directriz establecida para continuar con el proceso de pago.
            7.Llevar un adecuado archivo digital de los informes de todo el personal asignado.
            8.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.
            9.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.'
        ]);

        Specificcontratoractivity::create([
            'name' => 'MENSAJERO',
            'description' => '1.Apoyar en la entrega de soportes y copias que se requieran para el cierre del proyecto de semilleros.

            2.Entregar a las diferentes oficinas los documentos que se requieran Realizar un adecuado archivo de la información del proyecto de semilleros.

            3.Apoyar actividades de archivo de la información del proyecto de semilleros.

            4.Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.

            5.Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación

            6.Las demás funciones afines o complementarias con las anteriores y que le sean asignadas por el supervisor y que correspondan a la naturaleza del cargo.'
        ]);
    }
}
