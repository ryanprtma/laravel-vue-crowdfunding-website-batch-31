export const BlogComponent = {
    template : 
    `
    <div>
        <h1>{{blog.title}}</h1> <button @click="$emit('selected', blog.title)">Pilih</button>
        <p>{{blog.content}}</p>
    </div>
    `,
    data (){
        return {
            pesan : 'Blog Component'
        }
    },
    props : ['blog']
}