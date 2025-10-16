#!/usr/bin/env zsh
# rodar-laravel.sh
# Uso:
#   chmod +x rodar-laravel.sh
#   ./rodar-laravel.sh
#
# Script para preparar e rodar uma aplicação Laravel localmente com SQLite.

set -euo pipefail

echo "🚀 Iniciando configuração da aplicação Laravel..."

# 1) Verifica dependências
for cmd in php composer; do
  if ! command -v $cmd >/dev/null 2>&1; then
    echo "❌ Erro: '$cmd' não está instalado ou não está no PATH."
    echo "Instale com Homebrew: brew install php composer"
    exit 1
  fi
done

# 2) Instalar dependências do Composer
echo "📦 Instalando dependências via Composer..."
composer install --no-interaction --prefer-dist

# 3) Copiar arquivo .env se não existir
if [ ! -f .env ]; then
  echo "⚙️  Criando arquivo .env..."
  cp .env.example .env
else
  echo "ℹ️  Arquivo .env já existe. Mantendo o atual."
fi

# 4) Criar banco de dados SQLite
DB_PATH="database/database.sqlite"
if [ ! -f "$DB_PATH" ]; then
  echo "🗄️  Criando banco de dados SQLite em $DB_PATH..."
  mkdir -p database
  touch "$DB_PATH"
else
  echo "ℹ️  Banco SQLite já existe em $DB_PATH."
fi

# 5) Garantir configuração do .env para SQLite (opcional)
if ! grep -q "DB_CONNECTION=sqlite" .env; then
  echo "📝 Ajustando .env para usar SQLite..."
  sed -i '' 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env 2>/dev/null || true
  sed -i '' 's/^DB_DATABASE=.*/DB_DATABASE=database\/database.sqlite/' .env 2>/dev/null || true
fi

# 6) Gerar APP_KEY
echo "🔑 Gerando APP_KEY..."
php artisan key:generate --force

# 7) Rodar migrations e seeders
echo "🗃️  Rodando migrations e seeders..."
php artisan migrate --force
php artisan db:seed --force || echo "⚠️  Nenhum seeder padrão encontrado."

# 8) Corrigir permissões de pastas
echo "🔧 Ajustando permissões de pastas..."
chmod -R 775 storage bootstrap/cache || true

# 9) Limpar caches
echo "🧹 Limpando caches do Laravel..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 10) Iniciar servidor local
echo "🌍 Iniciando servidor local..."
php artisan serve --host=127.0.0.1 --port=8000
