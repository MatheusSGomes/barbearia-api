# API Barbearia

API criada para ser consumida pelo front-end: https://github.com/MatheusSGomes/barbearia-front-end

- Documentação com Swagger
- Testes com PHPUnit
- Banco de dados MySQL

- Autenticação com Laravel Sanctum

- Tratamento de erros
- Relacionamento com tabela de serviços (assim o administrator pode futuramente adicionar novos serviços a barbearia)

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
	"whatsapp": "61 9089-9089",
	"servicos": {
			"corte": true,
			"sobrancelhas": true,
			"barba": true,
			"hidratação": true
	},
	"horario": "seg-13-14"
}