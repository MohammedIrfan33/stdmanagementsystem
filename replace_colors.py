import os

dir_path = "resources/views"
for root, dirs, files in os.walk(dir_path):
    for f in files:
        if f.endswith(".blade.php"):
            path = os.path.join(root, f)
            with open(path, "r") as file:
                content = file.read()
            
            original_content = content
            
            # primary-button / secondary-button / default black buttons
            # wait! don't change ALL bg-gray-800, only the ones in button components
            if f in ["primary-button.blade.php"]:
                content = content.replace("bg-gray-800", "bg-teal-700")
                content = content.replace("hover:bg-gray-700", "hover:bg-teal-800")
                content = content.replace("focus:bg-gray-700", "focus:bg-teal-800")
                content = content.replace("active:bg-gray-900", "active:bg-teal-900")
                content = content.replace("focus:ring-indigo-500", "focus:ring-teal-700")
            
            if f in ["danger-button.blade.php"]:
                content = content.replace("bg-red-600", "bg-teal-700")
                content = content.replace("hover:bg-red-500", "hover:bg-teal-800")
                content = content.replace("active:bg-red-700", "active:bg-teal-900")
                content = content.replace("focus:ring-red-500", "focus:ring-teal-700")

            # General blue buttons
            content = content.replace("bg-blue-600", "bg-teal-700")
            content = content.replace("hover:bg-blue-700", "hover:bg-teal-800")
            content = content.replace("bg-blue-700", "bg-teal-800")
            
            # General red buttons (like 'Delete' in course/index.blade.php)
            if 'class="inline-flex' in content and 'bg-red-600' in content:
                content = content.replace("bg-red-600", "bg-teal-700")
                content = content.replace("hover:bg-red-700", "hover:bg-teal-800")

            # The cancel/save buttons in student/create and others might be using specific colors
            if "bg-gray-800" in content and "text-white" in content and ("submit" in content or "button" in content or "a href" in content) and f not in ["app.blade.php", "navigation.blade.php"]:
                content = content.replace("bg-gray-800", "bg-teal-700")
                content = content.replace("hover:bg-gray-900", "hover:bg-teal-800")
                content = content.replace("focus:outline-gray-900", "focus:outline-teal-800")
                content = content.replace("focus:outline-green-700", "focus:outline-teal-700")

            if content != original_content:
                with open(path, "w") as file:
                    file.write(content)
                print(f"Updated {path}")
