export default () => {
    return {
        modelName: 'cup_geo_area_mondiale',
        search: {
            modelName: 'cup_geo_area_mondiale',
            type: "v-search",
            fields: [],
            fieldsConfig: {},
            advancedFields: [],
            actionsConfig: {},
            searchWithButton: true,
        },
        // view : {
        //     modelName : 'cup_geo_area_mondiale',
        //     //fields : ['name','email','password','password_confirmation','banned','mainrole','fotos','attachments'],
        //     actions : [],
        //     fieldsConfig : {
        //         mainrole : {
        //             type : 'w-belongsto',
        //             fields : ['name']
        //         }
        //     }
        // },
        list: {
            modelName: 'cup_geo_area_mondiale',
            "type": "v-list",
            fields: ['codice', 'nome_it'],
            actions: [
                'action-edit', 'action-delete', 'action-insert',
                'action-export-csv'
            ],
            orderFields: {
                'codice': 'codice',
                'nome_it': 'nome_it'
            },
            actionsConfig: {
                'action-export-csv': {
                    text: 'Csv',
                }
            }
        },
        edit: {
            modelName: 'cup_geo_area_mondiale',
            type: 'v-edit',
            actions: ['action-save', 'action-save-back', 'action-back'],
            fields: ['codice', 'nome_it',
                //'comuni'
            ],
        },
    }
}
