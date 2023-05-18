<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesObjectsActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_activities = [
            [
                'activity' => "Planear, organizar, direccionar y realizar control de los servicios administrativos en el desarrollo del proyecto Semilleros Deportivos.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar, autorizar los pagos y control de la ejecución presupuestal del proyecto semilleros deportivos.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar reuniones de planeación y seguimiento del proyecto.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar la gestión de adquisición de bienes, obras y servicios para el proyecto.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar proyecciones de flujo de caja en la ejecución del proyecto.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes del Proyecto para correspondientes desembolsos requeridos por la supervisión del proyecto.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Atender los requerimientos administrativos y/o PQRS en el marco del proyecto.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas del proyecto, de carácter presencial y/o virtual.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes presentados por los contratistas bajo supervisión para la verificación del proceso técnico y de pago.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de sus actividades realizadas.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del contrato.",
                'role_activity_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la planeación técnica y social de las actividades que se desarrollaran en los Municipios en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Diseñar los formatos de ejecución y/o rendición del programa de las actividades de carácter técnico.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar las reuniones de planeación, seguimiento y control con el equipo técnico del proyecto.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Diseñar los planes o programas deportivos y/o recreativos a desarrollar en los municipios, en el marco del proyecto de Semilleros Deportivos.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar seguimiento a capacitaciones, talleres técnicos y componentes deportivos y/o recreativos del programa.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Dirigir, evaluar y apoyar la labor de los contratistas bajo su dirección.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas realizadas en campo de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar reuniones periódicas con los subdirectores técnicos regionales y coordinadores del proyecto.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Atender los requerimientos y/o PQRS en el marco del proyecto.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Informar al Director Administrativo de manera periódica los avances del proyecto, así como cualquier situación que afecte el desarrollo del mismo.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Consolidar el desarrollo técnico y resultados de los temas trabajados en el marco de la ejecución del proyecto.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes presentados por los contratistas bajo supervisión para la verificación del proceso técnico y de pago.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar las actividades de monitoreo y seguimiento al desarrollo del Proyecto en campo, dando cumplimiento a los indicadores establecidos.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de sus actividades realizadas.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la planeación, ejecución y seguimiento de los programas transversales en el marco del proyecto.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar, liderar, integrar entidades y autoridades gubernamentales y municipales o locales para la ejecución de las actividades transversales que se requieran en el marco del proyecto.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Brindar apoyo en el diseño de las campañas de divulgación para las redes sociales que permitan dar a conocer el proyecto y sus beneficios.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Brindar apoyo en la recolección de imágenes para la videoteca digital que da evidencia de las actividades del proyecto.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas realizadas en campo de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de sus actividades realizadas.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la planeación técnica y social de las actividades a desarrollar en los municipios de las regiones que le correspondan en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Dirigir, evaluar y apoyar la labor de los contratistas bajo su dirección.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Capacitar y orientar a los metodólogos que estén bajo su dirección.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar reuniones periódicas de planeación, seguimiento y control con los coordinadores Regionales, metodólogos y psicólogos de las regiones que le correspondan.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar la ejecución de los planes o programas deportivos y/o recreativos a desarrollar en los municipios bajo el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Informar al Director Técnico los avances del Proyecto, así como cualquier situación que afecte el desarrollo del mismo.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar los informes técnicos en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades y presentar al Director técnico.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes presentados por los coordinadores Regionales y Metodólogos de las regiones que le corresponda para la verificación del proceso técnico y validar el pago.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los cronogramas en plataforma presentados por los monitores deportivos de las regiones que le correspondan.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Verificar el cumplimiento de los indicadores de la región.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Evaluar el cumplimiento de las actividades de los contratistas bajo su dirección y rendir informe al director técnico.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar las actividades de monitoreo y seguimiento al desarrollo del Proyecto en campo.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas realizadas en campo de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar procesos de verificación de la gratuidad del programa en los Municipios y la garantía de derechos de los niños, niñas, adolescentes y jóvenes.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de sus actividades realizadas.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Diseñar y realizar metodologías de acompañamiento psicosocial en compañía del director técnico para el proyecto.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Brindar herramientas al equipo del Proyecto para fortalecer los procesos de convocatoria, trabajo en red, relación con las familias y dinámica grupal a través de talleres de formación y fortalecimiento del equipo de trabajo.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la solicitud de los escenarios que se requieren para la ejecución del proyecto.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Sugerir ajustes, mejoras y/o posibles modificaciones que se requieran para el fortalecimiento del trabajo social y la atención psicosocial en el proyecto.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar las pruebas de selección al contratista que se requiere para el desarrollo adecuado del proyecto.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Verificar el cumplimiento de las asesorías personalizadas y visitas de seguimiento en campo que realizará el equipo psicosocial a los beneficiarios y padres de familia.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Informar al Director Administrativo de manera periódica los avances del proyecto, así como cualquier situación que afecte el desarrollo del mismo.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe psicosocial en el que se dé cuenta de los resultados alcanzados en la ejecución de las actividades y presentar al Director Administrativo.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes presentados por los psicólogos para la verificación del proceso psicosocial, y validación del pago.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de sus actividades realizadas.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la socialización y hacer seguimiento del proyecto con los alcaldes y/o líderes sociales, recreativos y deportivos de los municipios de la región que le corresponda.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar visitas de seguimiento y control a los monitores deportivos de los municipios que le correspondan.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar reuniones periódicas con el equipo de la región  bajo su dirección para conocer y orientar el desarrollo del proyecto en campo.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Mantener permanente y buena comunicación con los contratistas de la región que le corresponde.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar y gestionar la ejecución de los planes o programas deportivos y/o recreativos a desarrollar en los municipios en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar la adecuada realización de las actividades del programa semilleros transversales en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar los informes en el que dé cuenta los resultados alcanzados en la ejecución de las actividades de la región asignada y presentar al subdirector técnico regional.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Evaluar el cumplimiento de las actividades de los contratistas bajo su dirección y rendir al subdirector técnico regional.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar los informes presentados por los monitores deportivos bajo supervisión para la verificación del proceso técnico y de pago.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas en campo de acuerdo a los indicadores del proyecto",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Consolidar la base de datos de los escenarios deportivos utilizados por los monitores de la región a cargo.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la socialización y hacer seguimiento del proyecto con los líderes sociales, recreativos y/o deportivos de la zona marítima.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar y gestionar la ejecución de los planes o programas deportivos y/o recreativos a desarrollar en la zona marítima.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas en campo de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Coordinar la adecuada realización de las actividades del programa semilleros transversales en el marco del proyecto semilleros deportivos.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar visitas de seguimiento y control a los monitores deportivos bajo su dirección.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Orientar a los coordinadores, metodólogos y monitores deportivos frente al manejo psicosocial de los niños y jóvenes pertenecientes al programa y que permitan fortalecer el desarrollo humano y social, de acuerdo a las directrices dadas por la coordinación psicosocial.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar las pruebas de selección al contratista que se requiere para el desarrollo adecuado del proyecto.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a las capacitaciones, reuniones y convocatorias que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar las asesorías personalizadas a los beneficiarios y padres de familia, para atender los casos puntuales de niños que requieran tratamiento y que sean informados por los monitores deportivos o metodólogos.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar conferencias a semilleros de familia de cada municipio bajo su dirección, de acuerdo a los indicadores establecidos, y realizar acta de reunión con registro fotográfico y listas de asistencia.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar conferencias al equipo de trabajo para la promoción de valores sociales y realizar acta de reunión con registro fotográfico y listas de asistencia.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Orientar al equipo técnico en herramientas lúdico creativas para el desarrollo de los semilleros transversales con los beneficiarios.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Informar al coordinador psicosocial de manera periódica los avances del proyecto, así como cualquier situación que afecte el desarrollo del mismo.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Evaluar el cumplimiento de las actividades psicosociales y transversales de los monitores asignados en la región y rendir al coordinador psicosocial.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Recibir orientación para la organización y desarrollo de programas transversales y registrar en la plataforma las actividades desarrolladas.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar y gestionar desde la parte psicosocial la ejecución de los planes o programas deportivos y/o recreativos a desarrollar en los municipios en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas en campo y asesorias personalizadas de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe psicosocial consolidado en el que dé cuenta de los resultados alcanzados en la ejecución de las actividades.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar capacitaciones técnicas a los monitores deportivos de sus municipios, brindándoles herramientas pedagógicas para el desarrollo físico y motriz de los beneficiarios, apoyándose en una metodología lúdica creativa que garantice el bienestar y permanencia de los usuarios del proyecto.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Desarrollar de forma virtual los talleres técnicos de la modalidad deportiva que les corresponda.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar y aprobar las fichas de inscripción y de tamizaje en plataforma digital de los beneficiarios de los monitores a cargo.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar seguimiento y retroalimentación al trabajo de los monitores deportivos durante las sesiones prácticas, dando cumplimiento a los indicadores establecidos.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Registrar en la plataforma digital las visitas en campo de acuerdo a los indicadores del proyecto.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar con el equipo de trabajo metodológico los planes clase por modalidad deportiva asignada e instruir a los monitores en su aplicación.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Desarrollar la ejecución de los planes o programas deportivos y/o recreativos a llevarse a cabo en los municipios en el marco del proyecto de Semilleros Deportivos.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Entregar al coordinador regional la base de datos donde se registra la información acerca de los escenarios deportivos utilizados por los monitores a su cargo.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Evaluar el cumplimiento de las actividades técnicas asignadas a los monitores de la región y rendir al subdirector técnico.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe técnico donde rinda los procesos metodológicos desarrollados por los monitores y beneficiarios en temas como: aplicación de las metodologías de trabajo, modalidades deportivas, desarrollo de componentes, participación en eventos, mundialitos, encuentros y festivales deportivos, y reporte de talentos deportivos.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Evaluar periódicamente el cumplimiento de la cobertura de los beneficiarios de los monitores deportivos.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar en el desarrollo de activación de rutas de violencia sexual de género con los monitores de su respectiva región.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que corresponda a la naturaleza del cargo.",
                'role_activity_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar y fortalecer el proceso de vinculación de las niñas, niños, adolescentes y jóvenes al proyecto, por medio de socializaciones en colegios, parques o espacios donde se encuentre la población.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Diligenciar las fichas de inscripción y tamizaje de los beneficiarios de acuerdo al indicador por disciplina deportiva, y reportar el retiro de los beneficiarios y el ingreso de beneficiarios de remplazo durante la ejecución del contrato, si aplica.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Implementar las orientaciones técnicas recibidas por parte del metodólogo como estrategia de fortalecimiento de los procesos de enseñanza - aprendizaje, para brindar un proceso de calidad.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la práctica deportiva con los beneficiarios de acuerdo a los contenidos establecidos en el plan clase entregado por el equipo técnico, sobre la disciplina a su cargo.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Mantener permanente y buena comunicación con el equipo del proyecto, los padres de familia, los líderes deportivos y sociales y los beneficiarios.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Implementar con sus beneficiarios las actividades del programa semilleros transversales en compañía de las psicólogas, metodólogos y coordinadores de la región.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe sobre los avances y el desarrollo del proceso según las orientaciones impartidas por el equipo técnico del proyecto y presentar al metodólogo para su aprobación.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el cronograma de prácticas deportivas y realizar actualizaciones si aplica.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la convocatoria a padres y/o acudientes para el desarrollo de los semilleros de familia y asesorías personalizadas que lideran las psicólogas en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar una vez al mes convocatoria para reunión de padres de familia y/o acudientes con el fin de dar orientación sobre el desarrollo técnico, deportivo y administrativo de los beneficiarios.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar en el desarrollo de activación de rutas de violencia sexual de género en relación a los niños, niñas, adolescentes y jóvenes, de acuerdo a la normativa colombiana.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Garantizar la gratuidad del programa en los Municipios y su enfoque diferencial.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Garantizar que la información se esté procesando de acuerdo con los principios de contabilidad legalmente aceptados en Colombia.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Entregar la ejecución presupuestal del proyecto a la Dirección Administrativa de acuerdo a los movimientos contables que se hayan ejecutado.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar los informes financieros para la rendición de cuentas a la entidad contratante.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar, organizar y controlar la información que se genere de las actividades contables.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Entregar original y copia de las facturas y documentos equivalentes para soportar los informes financieros.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar el registro de los documentos en el programa contable.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Convocar y/o asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Validar los antecedentes del personal a vincular, de acuerdo a requerimientos de contratación.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Revisar la documentación precontractual de la personas naturales y jurídicas.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Manejar la base de datos de todo el personal vinculado al proyecto Semilleros Deportivos.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar procesos contractuales como otrosi, suspensiones, modificaciones, adiciones, prorrogas, actas de terminación anticipadas y liquidación de contratos.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar el informe en el que dé cuenta de las actividades realizadas.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar al Director Administrativo del proyecto frente a las actividades administrativas que le asean asignadas.",
                'role_activity_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar en la recolección de información para la elaboración del informe administrativo, técnico y financiero para la rendición de cuentas a la entidad contratante.",
                'role_activity_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Recibir las fichas de inscripción diligenciadas de los beneficiarios del proyecto y emitir las estadísticas requeridas.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Diligenciar la información para el registro de beneficiarios a la aseguradora.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Responder por la base de datos digital y el registro físico de los beneficiarios.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Llevar un archivo de las fichas de inscripción física del proyecto Semilleros Deportivos.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar la consolidación de los soportes que requiera el equipo técnico del proyecto.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar el proceso de afiliación a la ARL de los contratistas del programa.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Manejar la plataforma del Drive en donde reposa los informes del contratista del proyecto.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar seguimiento y control del resultado de la cobertura del proyecto e informar su comportamiento al equipo directivo.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Organizar y coordinar las piezas de difusión para medios de comunicación en el marco del proyecto Semilleros Deportivos.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Buscar la información relevante en las regiones para divulgar en redes sociales.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Cubrir eventos, capacitaciones, conferencias, reuniones y festivales para redactar las crónicas en medios de comunicación.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Gestionar alianzas con medios de comunicación para la divulgación del programa.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar el informe de estadísticas de redes sociales y piezas o historias divulgadas.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar en la organización y coordinación de piezas para difusión en medios de divulgación en el marco del proyecto semilleros deportivos.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Buscar la información relevante en las regiones para divulgar en redes sociales.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Cubrir eventos como festivales para redactar las crónicas en medios de comunicación.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Gestionar alianzas con medios de comunicación para la divulgación de programa.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas por el director Administrativo y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Solicitar y organizar los documentos para la contratación del personal de la región o área asignada del proyecto.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Realizar convocatoria de contratistas a reuniones según la región o área que le corresponda.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Dar respuesta a las solicitudes realizadas por los contratistas del Proyecto según la región y el área que le corresponda.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Participar de reuniones de planificación y seguimiento administrativo.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Validar la información administrativa del contratista de la región que le corresponda, revisar su contenido verificando que se encuentre actualizado conforme a la directriz establecida para continuar con el proceso de pago.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Llevar un archivo digital de los informes de todo el personal asignado.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar en la entrega de soportes y copias que se requieran para el proyecto semilleros deportivos.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Entregar en las diferentes oficinas los documentos que se requieran, realizando un archivo de la información del proyecto de semilleros.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Apoyar actividades de archivo de la información del proyecto de semilleros.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Asistir a eventos, capacitaciones, conferencias, reuniones que le sean citadas por el programa, de carácter presencial y/o virtual.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Elaborar y presentar el informe de sus actividades y presentar a la Dirección Administrativa para su aprobación.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'activity' => "Las demás actividades afines o complementarias con las anteriores y que le sean asignadas por el supervisor y que correspondan a la naturaleza del cargo.",
                'role_activity_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('roles_objects_activities')->insert($roles_activities);
    }
}
