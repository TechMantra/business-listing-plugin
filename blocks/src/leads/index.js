import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('blp/business-lead', {
    title: 'Business Lead',
    icon: 'businessman',
    category: 'widgets',
    edit() {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <p>Business Lead Block</p>
            </div>
        );
    },
    save() {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <p>Business Lead Block</p>
            </div>
        );
    }
});
