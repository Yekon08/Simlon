json.extract! signup, :id, :name, :password, :email, :comments, :created_at, :updated_at
json.url signup_url(signup, format: :json)
