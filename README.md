**1. CLONAGEM DO PROJETO:**

```bash
git clone git@github.com:guilherme-tiossi/minibankerize.git
cd minibankerize
```

**2. CONFIGURAÇÃO DO AMBIENTE:**

```bash
cp .env.example .env
docker-compose run --rm app composer install
docker-compose up -d --build
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
```

**3. REQUISIÇÃO POST PARA http://localhost:8000/proposal NO MODELO:**

```bash
{
  "cpf": "123123123123",
  "nome": "Fulano de Tal",
  "data_nascimento": "2024-10-10",
  "valor_emprestimo": 1000.00,
  "chave_pix": "teste@teste.com"
}
```

**4.PARA ACOMPANHAR O STATUS DA PROPOSTA:**

```bash
docker-compose exec app bash
mysql -h mysql -u root -psecret
use minibankerize;
select * from proposals;
```

No início da requisição, **status** terá o valor de "processing" e **notificado** terá o valor de "false".
No fim da requisição, a api retorna o objeto com **status** igual a "approved" e **notificado** igual a "true".
