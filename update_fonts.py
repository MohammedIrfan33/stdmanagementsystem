import os

dir_path = "resources/views"

def update_file(path):
    with open(path, "r") as f:
        content = f.read()

    original = content
    
    # Change Poppins to Inter link
    content = content.replace("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap", "https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap")
    
    # Replace body class font-poppins with font-sans antialiased
    content = content.replace("font-poppins", "font-sans antialiased")
    
    # Update tailwind CDN to include Inter if needed, but it's easier to just use font-sans and configure tailwind if present
    # For login/register/guest they already use Poppins through custom css or CDN. But let's inject Inter in the script
    if "<script src=\"https://cdn.tailwindcss.com\"></script>" in content and "tailwind.config" not in content:
        content = content.replace("<script src=\"https://cdn.tailwindcss.com\"></script>", """<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        }
      }
    }
  }
</script>""")

    if content != original:
        with open(path, "w") as f:
            f.write(content)
        print(f"Updated {path}")

for root, dirs, files in os.walk(dir_path):
    for f in files:
        if f.endswith(".blade.php"):
            update_file(os.path.join(root, f))
