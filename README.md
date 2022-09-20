# API Barbearia

GET: /api/agenda
[
	{
		"nome": "João",
		"email": "joao@email.com",
		"whatsap": "61 9089-9089",
		"servicos": [
			"corte",
			"sobrancelhas",
			"barba",
			"hidratação"
		],
		"horario": "seg-13-14"
	},
	{
		"nome": "Felipe",
		"email": "felipe@email.com",
		"whatsap": "61 8797-8977",
		"servicos": [
			"corte",
			"sobrancelhas",
			"barba",
			"hidratação"
		],
		"horario": "seg-14-15"
	}
]

POST: /api/agenda
{
	"email": "joao@email.com",
	"whatsap": "61 9089-9089",
	"servicos": [
			"corte",
			"sobrancelhas",
			"barba",
			"hidratação"
	],
	"horario": "seg-13-14"
}